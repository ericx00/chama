<?php

namespace App\Support;

use App\Models\ActivityLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Throwable;

/**
 * Adds Eloquent lifecycle hooks that write a row into activity_logs whenever a
 * model is created, updated, or deleted. Models opt in by `use`-ing this trait.
 *
 * The trait deliberately swallows any logging exception so that audit failures
 * never block a successful business transaction.
 */
trait LogsModelActivity
{
    public static function bootLogsModelActivity(): void
    {
        static::created(function (Model $model) {
            self::recordModelActivity($model, 'created', null, $model->getAttributes());
        });

        static::updated(function (Model $model) {
            self::recordModelActivity(
                $model,
                'updated',
                self::pickAttributes($model->getOriginal(), array_keys($model->getDirty())),
                $model->getDirty()
            );
        });

        static::deleted(function (Model $model) {
            self::recordModelActivity($model, 'deleted', $model->getOriginal(), null);
        });
    }

    private static function recordModelActivity(Model $model, string $action, ?array $before, ?array $after): void
    {
        try {
            ActivityLog::create([
                'user_id'      => Auth::id(),
                'subject_type' => get_class($model),
                'subject_id'   => $model->getKey(),
                'action'       => sprintf('%s.%s', class_basename($model), $action),
                'description'  => sprintf('%s %s #%s', class_basename($model), $action, (string) $model->getKey()),
                'before'       => self::sanitise($before),
                'after'        => self::sanitise($after),
            ]);
        } catch (Throwable $exception) {
            Log::warning('Model activity logging failed', [
                'model'   => get_class($model),
                'action'  => $action,
                'message' => $exception->getMessage(),
            ]);
        }
    }

    private static function pickAttributes(array $source, array $keys): array
    {
        $result = [];
        foreach ($keys as $key) {
            if (array_key_exists($key, $source)) {
                $result[$key] = $source[$key];
            }
        }
        return $result;
    }

    private static function sanitise(?array $values): ?array
    {
        if ($values === null) {
            return null;
        }

        unset(
            $values['password'],
            $values['remember_token'],
            $values['updated_at'],
        );

        return $values;
    }
}
