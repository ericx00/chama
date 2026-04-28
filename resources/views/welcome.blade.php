<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chama Digital Record-Keeping System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 800px;
            width: 100%;
            padding: 60px 40px;
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 10px;
            font-size: 2.5em;
        }
        .subtitle {
            color: #667eea;
            font-size: 1.2em;
            margin-bottom: 30px;
        }
        .description {
            color: #666;
            font-size: 1.1em;
            line-height: 1.6;
            margin-bottom: 40px;
        }
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        .feature {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #667eea;
        }
        .feature h3 {
            color: #333;
            margin-bottom: 10px;
        }
        .feature p {
            color: #666;
            font-size: 0.9em;
        }
        .button-group {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }
        button {
            padding: 12px 30px;
            font-size: 1em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background: #667eea;
            color: white;
        }
        .btn-primary:hover {
            background: #5568d3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        .btn-secondary {
            background: #e0e7ff;
            color: #667eea;
        }
        .btn-secondary:hover {
            background: #c7d2fd;
            transform: translateY(-2px);
        }
        .status {
            background: #d4edda;
            color: #155724;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 20px;
        }
        .version {
            color: #999;
            font-size: 0.9em;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="status">✓ System Running - Ready to Use</div>
        <h1>Chama Digital</h1>
        <div class="subtitle">Record-Keeping System v1.0.0</div>
        
        <p class="description">
            A comprehensive digital platform for managing Chama group finances, member records, 
            contributions, loans, and meetings all in one place.
        </p>

        <div class="features">
            <div class="feature">
                <h3>👥 Members</h3>
                <p>Manage member profiles and records</p>
            </div>
            <div class="feature">
                <h3>💰 Contributions</h3>
                <p>Track and verify contributions</p>
            </div>
            <div class="feature">
                <h3>💳 Loans</h3>
                <p>Apply and manage loans</p>
            </div>
            <div class="feature">
                <h3>📊 Reports</h3>
                <p>Generate financial reports</p>
            </div>
            <div class="feature">
                <h3>📅 Meetings</h3>
                <p>Schedule and track meetings</p>
            </div>
            <div class="feature">
                <h3>🔐 Secure</h3>
                <p>Protected member data</p>
            </div>
        </div>

        <div class="button-group">
            <a class="btn-primary" style="text-decoration:none;display:inline-block;" href="{{ route('login') }}">Sign In</a>
            <a class="btn-secondary" style="text-decoration:none;display:inline-block;" href="https://github.com/ericx00/chama" target="_blank" rel="noopener">View on GitHub</a>
        </div>

        <div class="version">
            <strong>Status:</strong> Development Server Running<br>
            <strong>Database:</strong> SQLite Ready<br>
            <strong>Version:</strong> 1.0.0
        </div>
    </div>
</body>
</html>
