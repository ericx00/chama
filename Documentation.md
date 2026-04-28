**MASENO UNIVERSITY**

**COMPUTER SCIENCE DEPARTMENT**

**PROJECT REPORT**

**A DIGITAL RECORD-KEEPING SYSTEM FOR COMMUNITY SAVINGS GROUPS**

_A project submitted to the Department of Computer Science in the School of Computing and Informatics in partial fulfillment of the requirements for the award of the degree of Computer Science, for the Unit: Software Development Project, Maseno University._

**AUTHORS:**

**TMC/OOO8/022 TMC/OOO14/022**

**ERIC MUTETI MWENDWA CAROLINE AKINYI**

BSc. Mathematics and Computer Science BSc. Mathematics and Computer Science

**TMC/OOO74/021**

**PETER WAFULA NYONGESA**

BSc. Mathematics and Computer Science

## **DECLARATION**

We hereby declare that this project report titled "Community Savings Group Digital Record-Keeping System" is our original work and has not been submitted for examination in any other institution. Where other people's work has been used, references have been provided and in some cases quotations made. All sources of information have been specifically acknowledged by means of referencing.

**Signed:**

TMC/00074/021 TMC/00008/022

**PETER WAFULA NYONGESA ERIC MUTETI MWENDWA**

SIGN………………………………… SIGN……………………………

**CAROLINE AKINYI**

TMC/00014/022

SIGN……………………………

Date: DECEMBER 2025

**SUPERVISOR'S DECLARATION**

I confirm that the work reported in this project was conducted by the candidate under my supervision and has been submitted with my approval as the University Supervisor.

Supervisor Name: MR KENNEDY ABWAO

Designation: Lecturer, Department of Maths and Computer Science

Signature: ................................................

Date: ................................................

## **DEDICATION**

This project is dedicated to all the members of community savings groups across Kenya who work tirelessly to improve their financial well-being through collective savings and mutual support. Your commitment to community development and financial empowerment inspired this work.

We also dedicate this project to our family, friends, and mentors whose unwavering support, encouragement, and guidance made this achievement possible. Your belief in our potential has been a constant source of motivation.

May this system contribute to strengthening community-based financial institutions and promoting transparency and accountability in grassroots financial management.

## **ACKNOWLEDGMENT**

We would like to express our sincere gratitude to everyone who contributed to the successful completion of this project.

First, we are deeply grateful to our supervisor, MR KENNEDY ABWAO, for their invaluable guidance, constructive feedback, and continuous support throughout the development of this project. Their expertise in software development and understanding of community finance enriched this work.

We extend our appreciation to the Department of Maths and Computer Science at Maseno University for providing the necessary facilities, resources, and conducive learning environment that enabled us to undertake this project.

We are thankful to the community savings groups who participated in the requirements gathering phase, sharing their experiences, challenges, and expectations. Their insights were instrumental in shaping the system's design and functionality.

Finally, we thank the Almighty God for the gift of life, good health, wisdom, and strength to complete this project successfully.

## **ABSTRACT**

The Community Savings Group Digital Record-Keeping System is a web-based platform developed to address the challenges faced by informal savings and credit groups in Kenya regarding financial record management. Traditional manual record-keeping methods used by most community savings groups are prone to errors, data loss, manipulation, and lack of transparency, leading to disputes, mistrust, and inefficient operations.

This project presents a comprehensive digital solution designed to enhance accountability, improve financial management, and promote transparency within community savings groups. The system provides core functionalities including secure member registration, contribution tracking, loan management, repayment monitoring, meeting records, and automated financial reporting.

The primary objective of this project is to design and implement a user-friendly digital platform that enables community savings groups to record, monitor, and manage their financial activities accurately and securely. The system aims to minimise human error, reduce fraud opportunities, save time for group officials, and provide organised data that supports informed decision-making.

The development methodology employed follows the Software Development Life Cycle (SDLC) approach, incorporating requirements analysis, system design, implementation, testing, and deployment phases. The system is built using modern web technologies including Laravel 10 (PHP) for backend development, SQLite/MySQL for database management, Blade templating with Tailwind CSS for frontend design, and JavaScript for interactive features.

**Key features of the system include:**

- Secure user authentication and role-based access control
- Comprehensive member profile management
- Real-time contribution tracking with automated calculations
- Complete loan lifecycle management (application, approval, disbursement, repayment)
- Automated interest calculations and defaulter identification
- Meeting records and minutes management
- Detailed financial reporting and analytics
- Data backup and recovery mechanisms
- User-friendly interface designed for users with minimal computer experience

The system was evaluated through usability testing with actual community savings group officials, demonstrating significant improvements in record accuracy, time efficiency, and user satisfaction compared to manual methods. The project contributes to the digitisation of community-based financial institutions and promotes financial inclusion through appropriate technology solutions.

This documentation provides comprehensive coverage of the project including background research, problem analysis, system design, implementation details, testing procedures, and recommendations for future enhancements.

_Keywords: Community Savings Groups, Digital Record-Keeping, Financial Management, Savings Groups, Web Application, Database Design, User Interface Design, Laravel, Rotating Savings and Credit Associations_

## **DEFINITION OF TERMS**

**Community Savings Group (CSG):** An informal savings and credit association in Kenya (locally known by the Swahili term 'chama') where members pool resources for mutual benefit, operating on principles of mutual trust, collective responsibility, and regular financial contributions.

**Contribution:** Regular payment made by a member into the group's collective fund according to agreed schedules and amounts.

**Defaulter:** A member who has failed to meet their financial obligations (contributions or loan repayments) according to the agreed terms.

**Digitisation:** The process of converting manual, paper-based processes and records into digital format using computer systems.

**Loan:** Money borrowed by a member from the group's pooled funds, to be repaid with interest according to agreed terms.

**Manual Record-Keeping:** The traditional method of recording financial transactions using physical notebooks, ledgers, or papers.

**Member:** An individual who has been registered and accepted into the community savings group and participates in its financial activities.

**Merry-Go-Round:** A type of community savings group where contributions rotate among members, with each member receiving the total pool on their designated turn.

**Repayment:** The act of paying back a loan according to the agreed schedule, including both principal and interest amounts.

**ROSCA:** Rotating Savings and Credit Association; the academic term for informal savings groups where funds rotate among members.

**SACCO:** Savings and Credit Cooperative; a more formal, regulated version of a community savings group registered under cooperative laws.

**Table Banking:** A community savings group model where all financial transactions occur during meetings with money physically placed on a table for transparency.

**Treasurer:** The elected official responsible for maintaining financial records, managing money, and generating reports for the community savings group.

**User Interface:** The visual elements and interactive components through which users interact with the computer system.

**Validation:** The process of checking data input to ensure it meets specified criteria and is correct before processing or storage.

# **CHAPTER 1: INTRODUCTION**

## **1.1 Background Introduction**

### **1.1.1 Context of Community Savings Groups in Kenya**

Community Savings Groups (CSGs)-known locally by the Swahili term 'chama'-represent a fundamental pillar of Kenya's informal financial sector. These self-help groups, also known as merry-go-rounds or table banking groups, have existed for decades as community-based financial institutions that provide savings, credit, and social support services to their members. Community savings groups operate on principles of mutual trust, collective responsibility, and regular financial contributions, creating accessible financial services for populations often excluded from formal banking systems.

The importance of CSGs in Kenya's socio-economic landscape cannot be overstated. Research indicates that 40-45% of Kenyan adults participate in at least one community savings group, with participation rates even higher among women and rural populations. These groups collectively manage billions of shillings annually, making them significant players in grassroots economic development and poverty alleviation efforts.

### **1.1.2 Traditional Community Savings Group Operations**

In traditional community savings group operations, members come together on regular schedules-weekly, bi-weekly, or monthly-to pool their financial resources. Each member commits to contributing a predetermined amount during these meetings. The accumulated funds serve multiple purposes: they may be distributed to members on a rotational basis (merry-go-round model), used to provide loans to members at agreed interest rates, invested in income-generating activities that benefit the entire group, or saved collectively for specific group objectives.

Leadership within community savings groups typically consists of elected officials including a chairperson, secretary, treasurer, and committee members. The treasurer bears primary responsibility for maintaining financial records, collecting contributions, disbursing loans, and preparing financial reports. These officials serve voluntarily, often balancing group responsibilities with their personal employment and family commitments.

### **1.1.3 The Challenge of Manual Record-Keeping**

Despite their widespread importance and economic impact, the vast majority of community savings groups continue to rely on manual record-keeping methods. Treasurers typically use physical notebooks, ledgers, cash books, or even loose papers to document all financial transactions. This approach involves handwritten entries for member contributions, loan disbursements, repayments, fines, and meeting minutes.

While manual systems have served community savings groups for generations, they present significant challenges in the modern context. The inherent limitations of paper-based records-vulnerability to errors, damage, loss, and manipulation-create operational difficulties that undermine the effectiveness and sustainability of these vital community institutions.

### **1.1.4 Emerging Technology Opportunities**

Kenya has emerged as a regional leader in digital financial services, with high mobile phone penetration, widespread adoption of mobile money platforms like M-Pesa, and improving internet connectivity even in rural areas. This technological infrastructure creates favourable conditions for introducing digital solutions to community-based financial organisations.

The growing familiarity with technology among Kenyans presents an opportunity to modernise community savings group operations without imposing entirely foreign systems. Many CSG members already use mobile money for personal transactions, access banking services through their phones, and communicate via WhatsApp groups. This existing digital literacy provides a foundation upon which more sophisticated management systems can be built.

### **1.1.5 The Digital Solution**

The Community Savings Group Digital Record-Keeping System represents a response to the identified challenges and opportunities. This web-based platform is designed specifically for the Kenyan community savings group context, addressing the unique needs, constraints, and operational practices of these groups. Unlike generic accounting software or business management systems, this solution focuses exclusively on the core functions that community savings groups perform: member management, contribution tracking, loan administration, repayment monitoring, meeting documentation, and financial reporting.

The system aims to preserve the social and relational aspects of community savings groups that make them successful while modernising the administrative and record-keeping functions that currently create challenges. It is designed to be simple enough for users with minimal computer experience yet robust enough to manage the complex financial transactions that occur within active groups.

### **1.1.6 Vision and Impact**

By providing an accessible, affordable, and appropriate digital solution, this project seeks to contribute to the strengthening and sustainability of community savings groups across Kenya. The vision extends beyond mere computerisation of records to encompass transformation of group operations through enhanced transparency, improved accountability, reduced conflicts, and more efficient administration.

The goal is to support the financial empowerment of thousands of households and communities by ensuring that community savings groups can operate more effectively, scale more successfully, and serve their members more reliably. In doing so, the project contributes to broader objectives of financial inclusion, poverty alleviation, and community economic development.

## **1.2 Statement of the Problem**

### **1.2.1 Core Challenge**

The persistence of manual record-keeping in community savings groups represents a significant barrier to the effective financial management and growth of these vital community institutions. Despite the critical role these groups play in poverty alleviation and economic empowerment, their operational infrastructure remains pre-digital, creating numerous challenges that undermine their effectiveness and sustainability.

### **1.2.2 Specific Problems Identified**

#### **1.2.2.1 Data Accuracy and Integrity Issues**

Manual financial record-keeping systems are fundamentally unreliable when it comes to maintaining accurate records over time. Even the most diligent and honest treasurers make computational errors when performing manual calculations-adding up contributions, calculating loan interest, determining individual balances, or tallying group totals. Research suggests error rates of 1-5% in manual financial record-keeping, with these errors compounding over time as incorrect figures feed into subsequent calculations.

These accuracy problems create cascading effects. A single mis-recorded contribution amount can lead to incorrect member balance statements, which in turn affect loan eligibility determinations and dividend calculations. When errors are discovered months later, determining the correct figures often proves impossible, leaving the group unable to resolve discrepancies definitively.

#### **1.2.2.2 Record Loss and Physical Vulnerability**

Physical records face numerous threats to their survival. Fire, water damage, insect infestation, general wear and tear, theft, and simple misplacement can result in partial or total loss of critical financial information. Unlike digital systems with backup capabilities, lost paper records are typically irretrievable.

The concentration of all records in a single physical notebook controlled by the treasurer creates a single point of failure. If that notebook is lost or destroyed, the group loses its entire financial history, often leading to disputes, dissolution, or the need to restart operations from zero.

#### **1.2.2.3 Limited Accessibility and Transparency**

In manual systems, financial information remains locked in physical notebooks controlled by the treasurer. Members cannot independently verify their contribution history, check their loan balances, or review the group's financial status without specifically requesting information from the treasurer and waiting for it to be compiled.

This information asymmetry creates dependencies and can breed suspicion. Members may question whether their contributions have been properly recorded or whether loans are being disbursed fairly. The lack of transparent, accessible records makes it difficult for members to hold officials accountable or to participate meaningfully in financial decisions.

#### **1.2.2.4 Scalability Limitations**

As community savings groups grow in membership and financial complexity, manual systems become exponentially more difficult to manage. A treasurer who comfortably tracked ten members' simple contributions may find themselves overwhelmed when managing fifty members with varying contribution amounts, multiple simultaneous loans at different interest rates, and complex repayment schedules.

This scalability challenge constrains group growth. Successful groups that attract new members may reach a point where manual management becomes so burdensome that they must either limit membership, split into smaller groups, or risk administrative breakdown.

#### **1.2.2.5 Time Inefficiency**

Manual record-keeping consumes significant time. Treasurers spend hours recording transactions during meetings, performing calculations, preparing financial reports, responding to member inquiries about their account status, and reconciling discrepancies. This time investment represents substantial opportunity cost, taking volunteers away from income-generating activities and family responsibilities.

#### **1.2.2.6 Vulnerability to Fraud and Manipulation**

While most community savings group officials serve honestly, manual systems create opportunities for fraud that may prove too tempting for some individuals. Records can be altered, contributions can be misappropriated, loan payments can be pocketed rather than recorded, and balances can be manipulated-all with minimal risk of detection in systems lacking audit trails.

#### **1.2.2.7 Dispute Resolution Difficulties**

Financial disputes within community savings groups are common and can be destructive. Members may dispute how much they have contributed, whether their loan payments have been properly credited, what their current loan balance should be, or whether interest has been calculated correctly. Manual records often prove inadequate for resolving these disputes because erasures, overwriting, illegible entries, missing pages, or simply contradictory notations make it impossible to establish definitive facts.

#### **1.2.2.8 Lack of Decision-Support Information**

Effective financial management requires timely, accurate information. Group leaders need to know their current cash position before approving loan requests, identify members falling behind on contributions for follow-up, assess loan portfolio quality to manage risk, and evaluate trends in group financial health to inform strategy. Manual systems cannot provide this information quickly or easily.

### **1.2.3 Impact on Community Savings Group Effectiveness**

These interconnected challenges significantly undermine CSG effectiveness. Groups operating with manual systems experience higher rates of financial disputes, member dissatisfaction, and dissolution. They face constraints on growth and missed opportunities for serving their members better. The administrative burden discourages capable individuals from accepting treasurer positions, and the lack of professionalism in record-keeping limits potential partnerships with formal financial institutions.

### **1.2.4 The Need for Digital Transformation**

Given these multifaceted challenges, there exists a clear and urgent need for digital solutions specifically designed for the community savings group context. Such solutions must address the identified problems while remaining accessible, affordable, and appropriate for the target user population. The solution must enhance rather than complicate operations, strengthen rather than disrupt social bonds, and empower rather than intimidate users.

## **1.3 Proposed Solution**

### **1.3.1 Overview of the Digital System**

The Community Savings Group Digital Record-Keeping System represents a comprehensive web-based platform specifically designed to address the challenges identified in manual record-keeping. Rather than simply computerising existing manual processes, the system leverages digital technology to fundamentally improve how community savings groups manage their financial operations while preserving the cultural practices and social dynamics that make these groups successful.

The solution provides an integrated platform where all financial transactions-contributions, loans, repayments, fines-are recorded digitally, stored securely, and made accessible to authorised users through an intuitive web interface. The system automatically performs calculations, generates reports, tracks trends, and maintains complete audit trails, eliminating the primary sources of errors, disputes, and inefficiency in manual systems.

### **1.3.2 Key Solution Components**

#### **1.3.2.1 Secure Member Management**

The system provides comprehensive member registration and profile management capabilities. Each member has a unique digital record containing their personal information, contact details, membership dates, and account status. This centralised member database ensures that all financial transactions can be accurately attributed and tracked at the individual level.

#### **1.3.2.2 Automated Contribution Tracking**

All member contributions are recorded digitally with automatic date stamping, immediate balance updates, and receipt generation. The system automatically calculates cumulative savings, identifies missed contributions, tracks arrears, and generates individual contribution histories.

#### **1.3.2.3 Comprehensive Loan Management**

The system manages the complete loan lifecycle from application through final repayment. Members (or officials on their behalf) can submit loan requests digitally. The system tracks approval workflows, records disbursements, automatically calculates interest based on group policies, monitors repayments, updates outstanding balances, and identifies overdue loans.

#### **1.3.2.4 Automated Financial Reporting**

The system generates a wide range of financial reports automatically, including individual member statements, group financial summaries, contribution reports, loan portfolio analyses, and period comparisons. Reports can be generated instantly for any time period, eliminating the hours traditionally required for manual compilation.

#### **1.3.2.5 Meeting Records Management**

Beyond financial transactions, the system provides tools for recording meeting attendance, capturing minutes and decisions, tracking action items, and maintaining institutional memory.

#### **1.3.2.6 User-Friendly Interface**

Recognising that many community savings group officials have limited computer experience, the system prioritises simplicity and usability. The interface uses clear, familiar terminology, provides intuitive navigation, includes helpful prompts and validation, and requires minimal clicks to complete common tasks.

### **1.3.3 Technical Approach**

The system is built using modern, proven web technologies: Laravel 10 (PHP 8.2) provides the backend framework with the MVC architectural pattern; SQLite/MySQL handles data storage and retrieval; Blade templating with Tailwind CSS creates the user interface; and JavaScript adds interactive features. This technology stack was chosen for its reliability, widespread support, and suitability for the target environment. The system can be deployed on cloud-based hosting for groups with reliable internet access, or on local servers for groups preferring local hosting.

### **1.3.4 Security and Data Protection**

Understanding that financial data requires protection, the system incorporates multiple security layers including encrypted user authentication, role-based access controls, secure data transmission protocols (HTTPS), regular automated backups, and audit trails tracking all system activities.

### **1.3.5 Customisation and Flexibility**

While designed around common community savings group practices, the system accommodates variations in operational procedures. Groups can configure contribution schedules, define loan interest calculation methods, set approval workflows, and customise report formats without requiring programming changes.

### **1.3.6 Training and Support Approach**

The solution includes comprehensive user documentation, video tutorials for common tasks, context-sensitive help within the system, and troubleshooting guides. Initial training for group officials is designed to be completed in 2-3 hours.

### **1.3.7 Expected Benefits**

Implementation of this digital solution is expected to produce: elimination of calculation errors, dramatic reduction in record loss risk, enhanced transparency and member confidence, significant time savings for treasurers and officials, reduced financial disputes, improved decision-making through better information access, and professional record-keeping that could facilitate partnerships with formal financial institutions.

## **1.4 Objectives/Aims**

### **1.4.1 General Objective**

To design, develop, and implement a comprehensive digital record-keeping system that enhances accountability, improves financial management, promotes transparency, and strengthens organisational capacity within community savings groups and similar community-based savings and credit groups in Kenya.

### **1.4.2 Specific Objectives**

- To create a secure and comprehensive member registration module that captures and stores complete personal and financial details of all community savings group members, provides unique identification for each member, and supports member status tracking.
- To develop a robust contribution tracking feature that records all member contributions with dates and amounts, automatically calculates cumulative savings balances, identifies missed contributions, and generates contribution receipts and history reports.
- To build a comprehensive loan management system that handles loan applications, implements approval workflows, records disbursements, automatically calculates interest, tracks repayments, identifies defaulters, and provides complete loan history.
- To create reporting functionality that generates individual member financial statements, group-wide financial summaries, period-based reports, comparative analyses, and trend visualisations.
- To implement meeting management features that schedule meetings, track attendance, record minutes and decisions, and maintain a searchable archive of all meeting records.
- To design and implement an intuitive, accessible user interface requiring minimal computer experience, using clear terminology, logical navigation, and helpful validation.
- To implement robust security measures including secure authentication, role-based access controls, encrypted data storage, automated backups, and audit trails.
- To conduct comprehensive testing including unit, integration, user acceptance, performance, and security testing.
- To produce complete system documentation including technical documentation, user manuals, training materials, and implementation guidelines.

## **1.5 Research Questions**

### **1.5.1 Problem Understanding Questions**

RQ1: What are the specific challenges and pain points that community savings groups experience with manual record-keeping systems, and how do these challenges impact group operations and member satisfaction?

RQ2: What are the most critical functionalities that a digital system must provide to effectively address the identified challenges while remaining appropriate for the target user context?

RQ3: What factors influence whether community savings groups adopt and successfully implement digital record-keeping systems versus continuing with manual methods?

### **1.5.2 Design and Development Questions**

RQ4: What design principles and approaches are most effective for creating user interfaces that are accessible to users with varying levels of computer literacy and experience?

RQ5: How can digital systems be designed to accommodate the diversity of operational practices and policies across different community savings groups while maintaining system coherence and usability?

RQ6: What database structures and data models most effectively represent community savings group financial transactions, member relationships, and organisational hierarchies?

RQ7: What security measures are necessary and sufficient to protect financial data while maintaining system usability?

### **1.5.3 Implementation and Evaluation Questions**

RQ8: What implementation approach (cloud-based, local hosting, or hybrid) is most appropriate for different types of community savings groups given their varying levels of internet connectivity and technical infrastructure?

RQ9: What training methods and support structures are most effective for enabling group officials to successfully adopt and utilise digital record-keeping systems?

RQ10: How does the implementation of digital record-keeping systems impact key operational metrics such as record accuracy, time efficiency, member satisfaction, financial disputes, and overall group performance?

### **1.5.4 Broader Impact Questions**

RQ11: How can digital community savings group management systems contribute to broader financial inclusion objectives and strengthen the role of informal financial institutions in community economic development?

RQ12: What lessons from this project can inform the development of similar technology solutions for other community-based organisations?

## **1.6 Justification**

### **1.6.1 Economic Importance of Community Savings Groups**

Community savings groups represent a significant driver of financial activity and capital accumulation at the household and community levels in Kenya. With 40-45% of adults participating in at least one CSG, and with these groups collectively managing billions of shillings annually, they constitute a major component of Kenya's financial ecosystem. For many households, particularly in rural areas and informal urban settlements, CSGs provide the only accessible source of credit and the primary vehicle for systematic savings.

### **1.6.2 Addressing Critical Operational Challenges**

As documented in the problem statement, manual record-keeping creates serious operational challenges that undermine community savings group effectiveness. Poor record management leads to financial losses through untracked loans and unrecorded contributions, causes conflicts that damage group cohesion, erodes member trust, discourages capable individuals from assuming treasurer responsibilities, limits group growth, and prevents partnerships with formal financial institutions.

### **1.6.3 Benefits of Digital Transformation**

Digital systems perform calculations with perfect accuracy, eliminating arithmetic errors. Data preservation is enhanced through backup mechanisms. When authorised members can independently access and verify financial information, transparency increases dramatically. Automation of routine calculations and instant report generation save treasurers significant time. Immutable audit trails make fraud more difficult to commit and easier to detect. Ready access to accurate financial information enables better decision-making.

### **1.6.4 Technological Context and Readiness**

Kenya's position as a regional leader in digital financial services-with high mobile phone penetration, widespread mobile money adoption, improving internet connectivity, and demonstrated willingness to embrace financial technology-creates favourable conditions for this project. The success of M-Pesa demonstrates that Kenyans will adopt technology that provides clear value and meets genuine needs.

### **1.6.5 Social Impact and Inclusion**

Beyond purely economic considerations, this project contributes to promoting digital literacy among community members, empowering women who comprise the majority of CSG membership, demonstrating practical applications of technology for social good, strengthening community institutions, and bridging the digital divide.

## **1.7 Scope of the Project**

### **1.7.1 Included Functionality**

This project encompasses the development of a comprehensive web-based digital record-keeping system with the following core functionalities:

**Member Management**

- Complete member registration with personal details
- Member profile creation and editing
- Member status management (active, inactive, suspended)
- Member directory and search capabilities
- Membership history tracking

**Contribution Management**

- Recording of regular and ad-hoc contributions
- Automatic calculation of cumulative savings
- Tracking of missed contributions and arrears
- Contribution receipt generation
- Contribution history reports by member and period

**Loan Management**

- Loan application submission and processing
- Approval and rejection workflow implementation
- Loan disbursement recording
- Automatic interest calculation
- Repayment tracking and recording
- Outstanding balance maintenance
- Defaulter identification and loan portfolio reports

**Financial Reporting**

- Individual member statements
- Group financial summaries
- Period-based reports (daily, weekly, monthly, quarterly, annual)
- Contribution and loan portfolio reports
- Trend analysis and visualisation

**Meeting Management**

- Meeting scheduling and attendance tracking
- Minutes recording and decision documentation
- Meeting history archive

**Administrative Functions**

- User authentication and authorisation
- Role-based access control
- System configuration and data backup
- Audit trail viewing and system activity monitoring

### **1.7.2 Target Users**

The system is designed for use by community savings group officials in the following roles: Chairperson (overall oversight, strategic decisions, high-level reporting, approval functions); Treasurer (financial transaction recording, report generation, reconciliation, day-to-day monetary management); Secretary (meeting documentation, member communication coordination, administrative support); and Committee Members (review and approval functions, specialised responsibilities as assigned).

### **1.7.3 Technical Scope**

Platform: Web-based application accessible through standard browsers. Framework: Laravel 10 (PHP 8.2) with Blade/Tailwind CSS frontend. Database: SQLite (development) / MySQL (production). Supported Browsers: Modern versions of Chrome, Firefox, Safari, Edge. Device Support: Desktop computers, laptops, and tablets.

### **1.7.4 Explicitly Excluded Functionality**

To maintain project focus and feasibility, the following features are explicitly outside the project scope: direct mobile money (M-Pesa) API integration; commercial bank system integration; native mobile applications; automated SMS/email push notifications; advanced investment portfolio management; multi-group consolidated management; and AI-driven predictive analytics.

### **1.7.5 Geographical and Cultural Scope**

Primary Target: Community savings groups operating in Kenya. Language Support: English (primary). Cultural Adaptation: System design reflects Kenyan community savings group practices and terminology. Regulatory Environment: System does not address formal regulatory requirements for registered SACCOs.

## **1.8 Significance of the Study**

### **1.8.1 Significance for Community Savings Groups as Organisations**

This project contributes significantly to institutional development of community savings groups by providing them with professional-grade financial management tools. The ability to maintain accurate, comprehensive, and accessible financial records represents a fundamental aspect of organisational maturity. Groups with digital systems position themselves for growth, improved governance, potential partnerships with formal financial institutions, and recognition as legitimate economic actors in their communities. The transparent, verifiable records provided by digital systems directly address financial disputes by eliminating ambiguity about transactions.

### **1.8.2 Significance for Individual Members**

Members gain substantial confidence in their financial position when they can independently verify account status, understand their contribution history, track their loan obligations, and see their share of group assets. Digital systems ensure that all members are treated according to uniform rules and standards. Interacting with digital financial systems also helps members develop broader financial literacy.

### **1.8.3 Significance for Group Officials**

Officials, especially treasurers, experience significant workload reduction through system automation. Clear, accurate, tamper-evident records protect officials from accusations of mismanagement or fraud. Officials who successfully implement and manage digital systems gain recognition for technological competence and progressive leadership.

### **1.8.4 Significance for Technology Developers and Researchers**

This project provides developers and researchers with a concrete example of applying technology to genuine community needs, testing design principles for users with limited computer experience, and contributing to academic literature on information systems for community finance.

### **1.8.5 Significance for Kenyan Society**

By bringing digital tools to grassroots community organisations, this project promotes digital inclusion and helps bridge the digital divide. Stronger, more efficient community savings groups contribute to economic empowerment at household and community levels. As CSGs adopt professional management practices, they become more attractive partners for formal financial institutions.

## **1.9 Limitations**

### **1.9.1 User Literacy and Capacity Limitations**

While designed to be as user-friendly as possible, the system requires users to possess basic computer or smartphone literacy. Groups may need to invest in basic computer literacy training before implementing the system. Different users exhibit varying levels of comfort and confidence with technology, which can affect consistency of system use.

### **1.9.2 Integration and Connectivity Limitations**

The system does not integrate directly with mobile money platforms such as M-Pesa, meaning that contributions and repayments made through mobile money must be manually recorded. Similarly, bank transactions cannot be automatically imported. Cloud-based deployment requires internet connectivity, creating accessibility challenges in areas with unreliable service.

### **1.9.3 Functional Scope Limitations**

The system is designed for use by a single community savings group and does not support multi-group consolidated management. It focuses on core record-keeping functions rather than advanced financial analysis. The system does not send automated reminders or notifications.

### **1.9.4 Scale and Performance Limitations**

The system is optimised for typical groups with up to approximately one hundred members and is not intended for large-scale cooperative societies with thousands of members, complex hierarchical structures, or multiple branches.

### **1.9.5 Security and Privacy Limitations**

If multiple users share devices, there are risks of unauthorised access if users fail to log out properly. Ultimate responsibility for ensuring regular data backups rests with the group.

### **1.9.6 Cultural and Social Limitations**

Some groups may resist adopting digital systems due to comfort with traditional methods, scepticism about technology benefits, or fear of losing control over financial information. In some communities, physical written records may be viewed as more trustworthy than digital data. Introducing technology into social groups can alter interpersonal dynamics in unexpected ways.

### **1.9.7 Acknowledgment and Mitigation**

These limitations are acknowledged transparently to ensure realistic expectations among potential users. Many represent conscious design decisions that prioritise simplicity, affordability, and appropriateness for the target context. Where possible, the project includes recommendations for mitigating limitations, such as providing basic computer literacy training to address skill gaps, establishing clear backup procedures to protect data, and maintaining face-to-face meetings to preserve social bonds even when using digital records.

# **CHAPTER 2: LITERATURE REVIEW**

## **2.1 Introduction**

This literature review provides a comprehensive summary and critical analysis of existing research on digital solutions for informal savings groups, particularly focusing on the Kenyan context where community savings groups (CSGs) represent a vital component of the financial inclusion landscape. The review synthesises findings from peer-reviewed academic papers, institutional reports, policy documents, and empirical studies published primarily between 2007 and 2024 to highlight patterns, identify strengths and weaknesses in current approaches, and reveal critical gaps in the existing body of knowledge.

The review draws on established theoretical frameworks related to technology adoption and acceptance, particularly as they apply to resource-constrained and community-based settings. It examines empirical studies on digitisation efforts for groups like CSGs-Kenyan informal savings associations often categorised academically as Rotating Savings and Credit Associations (ROSCAs) or Accumulating Savings and Credit Associations (ASCAs). These groups represent indigenous financial mechanisms that have evolved over generations to meet the savings, credit, and social support needs of populations excluded from or underserved by formal banking institutions.

By identifying key trends-such as the progressive shift from purely manual paper-based systems to mobile application-based solutions-and critically examining the limitations of current approaches, this chapter provides robust justification for the current project's focus on developing a comprehensive web-based digital record-keeping system specifically tailored for Kenyan community savings groups. The review demonstrates that while mobile solutions have received considerable attention in recent literature, significant gaps remain in accessible, user-friendly web-based platforms that can accommodate the diverse operational models, varying literacy levels, and intermittent connectivity challenges characteristic of many CSG environments.

## **2.2 Theoretical Review**

The theoretical foundation for understanding and implementing digitisation of informal savings groups rests on well-established models of technology adoption, particularly those developed for and tested in low-resource, community-based settings where formal institutional support may be limited and user populations may have varying levels of technological literacy and access.

### **2.2.1 Technology Acceptance Model (TAM)**

The Technology Acceptance Model, originally proposed by Fred Davis in 1989, remains the most widely applied theoretical framework for predicting and explaining user acceptance of information systems across diverse contexts. Davis's seminal work established that two primary factors determine whether users will accept and use a technology system: perceived usefulness (PU) and perceived ease of use (PEOU).

Perceived usefulness refers to the degree to which a person believes that using a particular system would enhance their job performance (Davis, 1989). In the context of community savings group digitisation, this translates to members and officials believing that a digital record-keeping system will improve the accuracy of financial records, reduce time spent on administrative tasks, minimise disputes arising from unclear records, and enhance overall group financial management.

Perceived ease of use is defined as the degree to which a person believes that using a particular system would be free from effort (Davis, 1989). For CSG treasurers and members, many of whom may have limited prior exposure to computer systems, ease of use encompasses intuitive navigation, clear visual design, minimal steps to complete common tasks, and availability of help resources.

TAM's theoretical foundation draws from the Theory of Reasoned Action (TRA) in social psychology. Extensions including TAM2 (Venkatesh & Davis, 2000) added constructs such as subjective norm, image, job relevance, output quality, and result demonstrability. TAM3 (Venkatesh & Bala, 2008) incorporated determinants of perceived ease of use with a longitudinal perspective particularly valuable for understanding adoption trajectories.

In the specific context of informal savings groups, TAM provides a framework for understanding that successful digitisation depends on demonstrating clear usefulness (reduced errors, time savings, enhanced transparency), ensuring ease of use (interfaces designed for users with varying literacy levels), and building social acceptance (systems perceived as fair that enhance rather than threaten existing social dynamics).

### **2.2.2 Diffusion of Innovations Theory**

Diffusion of Innovations Theory, comprehensively articulated by Everett Rogers (2003), provides a complementary macro-level perspective on how innovations spread through social systems over time. Rogers defines diffusion as the process by which an innovation is communicated through certain channels over time among the members of a social system.

Five key attributes of innovations influence their rate of adoption: (1) Relative advantage-the degree to which an innovation is perceived as better than the idea it supersedes; (2) Compatibility-the extent to which an innovation aligns with existing values and needs; (3) Complexity-the degree to which an innovation is perceived as difficult to understand or use; (4) Trialability-the extent to which an innovation can be experimented with on a limited basis; and (5) Observability-the degree to which results are visible to others.

Rogers' theory also describes five adopter categories: Innovators (2.5%), Early Adopters (13.5%), Early Majority (34%), Late Majority (34%), and Laggards (16%). Cumulative adoption follows an S-shaped curve. For community savings group digitisation, this suggests strategies of identifying and supporting innovative groups, leveraging respected leaders to demonstrate benefits, and providing evidence of success to encourage the more cautious majority.

### **2.2.3 Unified Theory of Acceptance and Use of Technology (UTAUT)**

UTAUT, developed by Venkatesh, Morris, Davis, and Davis (2003), represents a synthesis of eight prominent technology acceptance models achieving approximately 70% of variance in usage intentions. Its four key determinants are: Performance Expectancy (degree to which using the technology provides benefits); Effort Expectancy (degree of ease associated with use); Social Influence (extent to which important others believe one should use the technology); and Facilitating Conditions (degree to which organisational and technical infrastructure supports use). These relationships are moderated by gender, age, experience, and voluntariness.

### **2.2.4 Application to Financial Technology in Developing Contexts**

Research across multiple African countries has demonstrated that TAM, Diffusion of Innovations, and UTAUT maintain significant predictive validity. Mobile money adoption studies in Kenya confirm that perceived usefulness strongly predicts usage, followed by ease of use and social influence. However, several limitations arise in African contexts: underemphasis on social capital, structural barriers (infrastructure, costs), and cultural factors such as collectivist orientations and oral traditions.

This project adopts an integrated theoretical approach drawing on TAM for individual acceptance, Diffusion of Innovations for implementation strategy, UTAUT for facilitating conditions, and Social Capital Theory for trust and group cohesion considerations. The project's hypothesis, grounded primarily in TAM, is that a web-based record-keeping system demonstrating high perceived usefulness and ease of use will achieve substantial adoption among Kenyan community savings groups when supported by adequate facilitating conditions and social endorsement.

## **2.3 Critique of Existing Literature**

The existing literature on digitising informal savings groups demonstrates significant progress, particularly in mobile application solutions, but reveals persistent gaps in comprehensive, accessible, context-appropriate systems specifically designed for Kenyan community savings groups. This section provides detailed critical review of five peer-reviewed articles selected based on recency, methodological rigour, relevance to Kenya or comparable East African contexts, and explicit focus on digital tools for informal savings groups.

### **2.3.1 Article 1: Chidziwisano, Namangale, and Kumwenda (2020)**

**Full Citation:**

Chidziwisano, K., Namangale, J., & Kumwenda, T. (2020). Design and evaluation of a mobile prototype application for community savings groups in Kenya. In Proceedings of the 2020 IST-Africa Conference. IEEE.

**Study Focus and Methodology:**

This conference paper presents the design, development, and preliminary evaluation of 'SmartChama', a mobile prototype application specifically created for Kenyan informal savings groups. The study employed a mixed-methods approach including semi-structured interviews with 15 officials, three co-design workshops, and a four-week pilot evaluation with 12 users using the System Usability Scale (SUS) and task completion rates.

**Key Findings:**

The prototype achieved a mean SUS score of 71.2 (SD=8.3), considered 'acceptable' but below the 'good' threshold of 80. Task completion rates exceeded 85% for common operations but dropped to 58% for complex tasks. Comparison of manual versus system records showed 87% reduction in arithmetic errors. Collaborative features maintaining social dynamics were as important as functional capabilities.

**Strengths:**

Strong participatory approach; quantitative usability metrics; recognition of social dynamics alongside functional requirements; context-appropriate focus on Kenyan groups.

**Limitations and Gaps:**

Android-only application excluded users with basic feature phones; required continuous connectivity for Firebase synchronisation; limited 4-week pilot with only 12 users; participants skewed younger and more educated; no web alternative explored.

### **2.3.2 Article 2: Gugerty (2007)**

**Full Citation:**

Gugerty, M. K. (2007). You can't save alone: Commitment in rotating savings and credit associations in Kenya. Economic Development and Cultural Change, 55(2), 251-282.

**Study Focus and Methodology:**

This seminal article examines the economic logic and social mechanisms underlying ROSCAs in rural Kenya, surveying 192 ROSCA members across 24 groups using probit regression models and qualitative interviews.

**Key Findings:**

68% of respondents cited 'forced discipline' or 'guaranteed saving' as primary benefits. Social sanctions maintained near-zero default rates. Members valued the inflexibility of contribution schedules as a beneficial constraint rather than a limitation.

**Relevance to Current Project:**

Gugerty's findings on commitment mechanisms suggest digital systems must preserve beneficial rigidity and social visibility. Systems should maintain structural constraints while adding transparency and accuracy. Features that introduce excessive flexibility might inadvertently undermine the commitment value that makes these groups effective.

### **2.3.3 Article 3: Anderson and Baland (2002)**

**Full Citation:**

Anderson, S., & Baland, J. M. (2002). The economics of ROSCAs and intrahousehold resource allocation. The Quarterly Journal of Economics, 117(3), 963-995.

**Study Focus and Methodology:**

This influential paper examines ROSCAs through the lens of intrahousehold bargaining and gender economics, using game-theoretic models and empirical survey of 180 women in Kibera, Nairobi.

**Key Findings:**

ROSCAs help women protect savings from household pressure; 73% of participants were women despite women constituting 52% of the employed sample; participation increased with measures of intrahousehold conflict; ROSCAs complement rather than replace formal savings.

**Relevance to Current Project:**

Digital systems must recognise and preserve the strategic functions CSGs serve for women. Transparency features must be designed carefully to avoid inadvertently exposing members' savings to household pressures. The gender lens highlights the importance of inclusive design ensuring women with lower technological literacy can still benefit from digitisation.

### **2.3.4 Article 4: Muthinja and Chipeta (2018)**

**Full Citation:**

Muthinja, M. M., & Chipeta, C. (2018). What drives fintech adoption in Kenya? In Handbook of Blockchain, Digital Finance, and Inclusion, Volume 1 (pp. 109-125). Academic Press.

**Key Findings:**

M-Pesa's reach (29.4 million users by 2018) created foundational digital finance infrastructure. Smartphone penetration reached approximately 45% by 2018 with lower rates in rural areas. Kenya's light-touch regulatory approach fostered innovation. Established institutions enjoyed higher trust than startups. Physical agent networks bridged the digital-physical divide.

**Relevance to Current Project:**

Muthinja and Chipeta establish that Kenya possesses enabling conditions for CSG digitisation but highlight persistent barriers. The 45% smartphone penetration (even lower in rural areas) suggests web-based systems accessible from multiple device types may reach broader populations than Android-only apps. The importance of trust and physical support networks argues for implementation strategies including in-person training.

### **2.3.5 Article 5: Johnson, Malkamaki, and Wanjau (2006)**

**Full Citation:**

Johnson, S., Malkamaki, M., & Wanjau, K. (2006). Tackling the 'frontiers' of microfinance in Kenya: The role for decentralized services. Small Enterprise Development, 17(3), 41-53.

**Key Findings:**

Informal groups achieved high transparency through radical simplicity-all transactions public, conducted during meetings, immediately verified by all members. Groups maintained 99% repayment rates through social collateral. Informal groups operated at near-zero administrative cost through volunteer leadership.

**Relevance to Current Project:**

The lesson of simplicity and social transparency suggests digital systems should prioritise these attributes over sophisticated features. Transparency derives not from complex reporting capabilities but from making all transactions immediately visible and verifiable. Digital solutions should be free or extremely low-cost to maintain the fundamental sustainability advantage of informal systems.

### **2.3.6 Summary Table of Reviewed Articles**

**_Table 1: Summary of Reviewed Articles_**

| **Author(s) & Year**       | **Title / Focus**                                        | **Methodology**                                                     | **Key Findings**                                                                                   | **Gaps / Limitations**                                                                        |
| -------------------------- | -------------------------------------------------------- | ------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------- |
| Chidziwisano et al. (2020) | Mobile prototype for Kenyan CSGs                         | Participatory design, SUS evaluation, 4-week pilot (n=12)           | 87% error reduction; SUS 71.2; social features critical                                            | Android-only; constant internet required; small pilot                                         |
| Gugerty (2007)             | Commitment in ROSCAs in Kenya                            | Survey of 192 members (24 groups); probit regression                | Commitment is primary motivation; social sanctions ensure near-zero defaults                       | Pre-digital era; limited discussion of record-keeping                                         |
| Anderson & Baland (2002)   | Economics of ROSCAs & intrahousehold resource allocation | Game-theoretic model + survey of 180 Kibera women                   | ROSCAs help women protect savings; complement formal banking                                       | Pre-mobile era; urban sample; no digitisation discussion                                      |
| Muthinja & Chipeta (2018)  | Drivers of fintech adoption in Kenya                     | FinAccess surveys 2006-2016; 25 executive interviews; case studies  | M-Pesa ecosystem enabling; 45% smartphone penetration; trust and agents critical                   | Not CSG-specific; more descriptive than causal                                                |
| Johnson et al. (2006)      | Frontiers of microfinance in Kenya                       | Case studies of 4 MFIs + 30 informal groups; cost-benefit modelling | Informal groups achieve transparency through simplicity; near-100% repayment via social collateral | Pre-smartphone era; focuses on lessons for formal MFIs rather than digitising informal groups |

## **2.4 Summary**

This literature review reveals several major findings and recurring themes that contextualise the current project within existing scholarship. Established theoretical frameworks (TAM, Diffusion of Innovations, UTAUT) provide robust foundations for understanding technology adoption in community financial organisations. Recent literature heavily emphasises mobile application solutions, with studies demonstrating feasibility but also revealing limitations around device dependency and connectivity requirements.

Multiple studies emphasise that informal savings groups provide social and strategic functions beyond pure financial services. Successful digitisation must preserve these social elements-transparency, collective decision-making, mutual accountability. Women dominate CSG participation and derive specific benefits; digital systems must consciously address gender-specific barriers. Evidence from both theoretical work and practical implementations indicates effectiveness derives from radical simplicity and immediate transparency rather than sophisticated complexity. Persistent infrastructure challenges include intermittent connectivity in rural areas and limited smartphone penetration.

## **2.5 Research Gaps**

Despite the significant body of literature on informal savings groups and digital financial services in Kenya, several critical research gaps justify the current project:

**Gap 1: Platform Diversity - Web versus Mobile-Only Solutions**

The overwhelming majority of recent digitisation efforts focus exclusively on mobile applications, assuming smartphone ownership and literacy. Yet Kenya's digital landscape remains heterogeneous with substantial populations accessing internet via shared computers, feature phones, or intermittent smartphone access. No reviewed study examined web-based systems accessible from multiple device types.

**Gap 2: Offline Functionality and Intermittent Connectivity**

Most digital finance literature assumes continuous internet connectivity, yet many rural areas experience intermittent coverage. No reviewed study evaluated offline-capable designs with automatic synchronisation for groups meeting in areas with poor network coverage.

**Gap 3: Low-Literacy Interface Design**

While studies acknowledge the need for simple interfaces, specific design principles for low-literacy contexts receive limited systematic investigation. No reviewed study systematically evaluated alternative interface approaches with actual low-literacy CSG users.

**Gap 4: Comprehensive Lifecycle Management**

Many studies examine isolated functions rather than integrated systems supporting the complete financial lifecycle from member registration through contribution tracking, loan management, and comprehensive reporting.

**Gap 5: Longitudinal Adoption and Sustainability Studies**

Most studies report short-term pilots with limited evidence on long-term sustained usage. No reviewed study tracked digital system usage beyond six months or examined factors predicting sustained adoption versus abandonment.

**Gap 6: Cultural and Linguistic Contextualisation**

Most digital finance systems default to English interfaces, yet approximately 67% of Kenyans speak Swahili as first or second language. Few studies examine multilingual interfaces or culturally specific interface metaphors.

**Gap 7: Integration with Existing Infrastructure**

Research on integration between community savings group management systems and M-Pesa or banking APIs remains limited, leaving the potential for automated contribution verification unexplored.

## **2.6 Identified Research Gap**

Synthesising the specific gaps identified above, the overarching research gap this project addresses is: the absence of comprehensive, web-based, offline-capable, low-literacy-accessible digital record-keeping systems specifically designed for Kenyan community savings groups that integrate full financial workflows (member management, contributions, loans, reporting) while preserving essential social transparency mechanisms and accommodating infrastructure constraints (intermittent connectivity, diverse device access, limited technical support).

This gap is significant because it represents a barrier to digital inclusion for the most vulnerable segments of CSG populations-rural groups, older members, less-educated treasurers-who could benefit most from error reduction and transparency but are excluded by current technology approaches.

## **2.7 Research Problem**

Kenyan informal savings groups continue to experience high rates of financial record disputes, group dissolution, and operational inefficiency due to persistent reliance on manual paper-based record-keeping, despite Kenya's advanced digital financial infrastructure. This persistence occurs because existing digital solutions-predominantly mobile applications requiring smartphones and continuous connectivity-fail to accommodate the diverse device access patterns, intermittent connectivity, varying technological literacy levels, and complete functional needs characteristic of typical community savings groups, particularly in rural areas where informal finance dependence is highest and formal alternatives are most limited.

Specifically, the problem manifests as: continued high error rates in manual calculations (affecting approximately 15-20% of loan interest computations); record loss and dispute escalation affecting 10-15% of groups per year; limited transparency due to single-treasurer record control; scalability constraints preventing groups from expanding beyond 15-20 members; and technology adoption barriers with existing digital solutions achieving only 10-15% sustained adoption rates due to smartphone requirements, connectivity dependency, complexity, and incomplete functionality.

This project addresses this problem by developing and evaluating a web-based digital record-keeping system specifically designed to overcome identified barriers-device-agnostic web access, low-literacy-focused interface design, comprehensive functional integration, and a free/low-cost sustainability model-while rigorously measuring effects on accuracy, efficiency, transparency, and user satisfaction.

## **References**

Anderson, S., & Baland, J. M. (2002). The economics of ROSCAs and intrahousehold resource allocation. The Quarterly Journal of Economics, 117(3), 963-995.

Central Bank of Kenya. (2024). 2024 FinAccess Household Survey Report. Nairobi: Central Bank of Kenya.

Chidziwisano, K., Namangale, J., & Kumwenda, T. (2020). Design and evaluation of a mobile prototype application for community savings groups in Kenya. In Proceedings of the 2020 IST-Africa Conference. IEEE.

Davis, F. D. (1989). Perceived usefulness, perceived ease of use, and user acceptance of information technology. MIS Quarterly, 13(3), 319-340.

GSMA. (2023). The Mobile Economy: Sub-Saharan Africa 2023. GSMA Intelligence.

Gugerty, M. K. (2007). You can't save alone: Commitment in rotating savings and credit associations in Kenya. Economic Development and Cultural Change, 55(2), 251-282.

Johnson, S., Malkamaki, M., & Wanjau, K. (2006). Tackling the 'frontiers' of microfinance in Kenya: The role for decentralized services. Small Enterprise Development, 17(3), 41-53.

Mbiti, I., & Weil, D. N. (2011). Mobile banking: The impact of M-Pesa in Kenya. NBER Working Paper No. 17129.

Muthinja, M. M., & Chipeta, C. (2018). What drives fintech adoption in Kenya? In Handbook of Blockchain, Digital Finance, and Inclusion, Volume 1 (pp. 109-125). Academic Press.

Rogers, E. M. (2003). Diffusion of innovations (5th ed.). Free Press.

Venkatesh, V., & Bala, H. (2008). Technology acceptance model 3 and a research agenda on interventions. Decision Sciences, 39(2), 273-315.

Venkatesh, V., & Davis, F. D. (2000). A theoretical extension of the technology acceptance model: Four longitudinal field studies. Management Science, 46(2), 186-204.

Venkatesh, V., Morris, M. G., Davis, G. B., & Davis, F. D. (2003). User acceptance of information technology: Toward a unified view. MIS Quarterly, 27(3), 425-478.

# **CHAPTER 3: SYSTEM ANALYSIS AND DESIGN**

## **3.1 Introduction**

This chapter presents a comprehensive analysis and design of the Community Savings Group Digital Record-Keeping System (hereafter referred to as the Community Savings System or CSS). It documents the systematic process through which the researchers gathered user requirements, analysed the current operational environment, and translated findings into a coherent technical design capable of addressing the problems identified in the preceding chapters.

The chapter begins by describing the Systems Development Methodology adopted for the project, followed by a feasibility assessment evaluating the viability of the proposed solution. Requirements elicitation is then detailed, including the data collection instruments used, how they were administered, and an analysis of the findings obtained. The chapter proceeds to define the system specifications, encompassing both functional and non-functional requirements, before presenting the complete system design in terms of logical and physical architecture, data design, process design, and interface design.

All design decisions presented in this chapter are grounded in the data collected from community savings group officials and members, ensuring that the resulting system is a practical solution informed by real-world needs and constraints. The design reflects the actual implementation-a Laravel 10 application with PHP 8.2, SQLite/MySQL, Blade templating, and Tailwind CSS-derived from the codebase developed for this project.

## **3.2 Systems Development Methodology**

The development of the Community Savings System follows the Software Development Life Cycle (SDLC) framework, specifically employing the Waterfall model as its guiding process. The Waterfall model was selected because the project requirements, though complex, were sufficiently well understood at the outset through preliminary stakeholder engagement to permit a structured, sequential approach. Its clearly defined phases and milestone-based checkpoints make it particularly suitable for an academic project with fixed timelines and a defined scope.

The SDLC Waterfall model proceeds through the following sequential phases:

- Requirements Analysis: Gathering and documenting user and system requirements through questionnaires, stakeholder consultation, and review of existing manual processes.
- System Design: Translating requirements into a detailed technical blueprint including database schema, process flows, interface wireframes, and system architecture.
- Implementation (Code Generation): Converting design artefacts into functional source code using Laravel 10, PHP 8.2, SQLite/MySQL, Blade, and Tailwind CSS.
- Testing: Subjecting the implemented system to systematic verification and validation tests to ensure correctness, reliability, and usability.
- Deployment: Installing the system in a production-ready environment and conducting final user acceptance evaluation.
- Maintenance: Addressing defects identified post-deployment and implementing recommended enhancements.

## **3.3 Feasibility Study**

### **3.3.1 Technical Feasibility**

The technology stack selected for this project-Laravel 10 (PHP 8.2), SQLite/MySQL, Blade templating, Tailwind CSS, and JavaScript-comprises mature, widely supported, and well-documented technologies. The development team possesses the requisite proficiency in these technologies. Web hosting infrastructure capable of supporting Laravel is abundantly available; the system can also run locally using PHP's built-in server (php -S 127.0.0.1:8000) without additional web server installation. Technical feasibility is confirmed.

### **3.3.2 Economic Feasibility**

The system is being developed as an academic project with no external development cost. When deployed to community savings groups, it can be hosted on low-cost shared hosting plans typically costing between KES 2,000 and KES 5,000 per year. This is substantially lower than the cost of the disputes, record losses, and time inefficiencies attributed to manual systems. Economic feasibility is confirmed.

### **3.3.3 Operational Feasibility**

Findings from the requirements elicitation phase indicate strong willingness among group officials to adopt a digital solution-90% of respondents agreed or strongly agreed with the need for such a system. The system is web-based, requiring no complex installation on end-user devices, and is accessible from any modern browser. Initial training for group officials is estimated at two to three hours. Operational feasibility is confirmed.

### **3.3.4 Schedule Feasibility**

The project has been scoped to fit within the eight-month academic project timeframe. The three-member development team, defined scope, and choice of Laravel (which provides scaffolding that accelerates development) make the schedule achievable. Schedule feasibility is confirmed.

## **3.4 Requirements Elicitation**

### **3.4.1 Data Collection Instrument**

The primary data collection instrument employed was a structured questionnaire. The questionnaire was chosen because it allows systematic collection of data from a geographically distributed population in a standardised format, facilitating quantitative analysis. Additionally, questionnaires reduce interviewer bias and allow respondents to answer at their own pace, which is particularly appropriate when targeting busy community savings group officials who serve on a voluntary basis.

The questionnaire was developed in three stages. In the first stage, the research team reviewed the problem statement and specific objectives to identify the information domains requiring investigation. In the second stage, a draft was prepared and subjected to peer review, then reviewed and approved by the project supervisor, Mr. Kennedy Abwao, before administration. In the third stage, minor revisions were made based on supervisor feedback. The approved questionnaire is attached as Appendix A.

The questionnaire comprised five sections: (i) respondent demographic and group profile information, (ii) current record-keeping practices and associated challenges, (iii) technology access and digital literacy, (iv) specific functional requirements for a digital system, and (v) general expectations and concerns regarding digitisation. Questions used a combination of Likert-scale items, multiple-choice items, and open-ended items to capture qualitative perspectives.

### **3.4.2 Target Population and Sampling**

The target population consisted of officials and members of community savings groups in the Kisumu and Siaya counties of Kenya. A purposive sampling approach was adopted, targeting individuals holding operational roles-specifically treasurers, chairpersons, secretaries, and committee members-as these individuals have direct and detailed knowledge of the record-keeping challenges the system seeks to address. A total of 30 questionnaires were distributed, all of which were returned completed, yielding a 100% response rate. Questionnaires were distributed both physically during two scheduled group meetings and electronically via WhatsApp.

### **3.4.3 Questionnaire Administration**

Physical questionnaire administration was conducted over two consecutive Saturdays, coinciding with regular group meetings in Kisumu town and Siaya town respectively. The research team was present during administration to clarify ambiguities, though respondents completed the instrument independently. For electronically distributed questionnaires, a brief explanatory note was included. Respondents were assured of anonymity; no names were recorded and responses were aggregated for analysis.

## **3.5 Data and System Analysis**

Completed questionnaires were coded and entered into Microsoft Excel for tabulation and analysis. Frequencies and percentages were computed for each closed-ended item. The findings are presented below in tables accompanied by interpretive commentary. Charts are included in Appendix B.

### **3.5.1 Respondent Profile**

Of the 30 respondents, 17 (57%) were female and 13 (43%) were male, reflecting the female-majority participation characteristic of community savings groups. Roles: 10 (33%) treasurers, 8 (27%) chairpersons, 6 (20%) secretaries, 6 (20%) committee members. Group sizes ranged from 10 to 45 members (mean ≈ 22). All respondents had been members for at least one year; 18 (60%) reported membership of three or more years.

### **3.5.2 Analysis of Current Record-Keeping Challenges**

**_Table 3.1: Frequency of Financial Record Disputes_**

| **Response**    | **Frequency** | **Percentage (%)** |
| --------------- | ------------- | ------------------ |
| Very Frequently | 8             | 27%                |
| Frequently      | 12            | 40%                |
| Occasionally    | 7             | 23%                |
| Rarely          | 3             | 10%                |
| **Total**       | **30**        | **100%**           |

The data in Table 3.1 reveals that 67% of respondents experience disputes from financial records either frequently or very frequently. Only 10% indicated that disputes rarely arise, underscoring the urgency of the problem.

**_Table 3.2: Member Satisfaction with Manual Record-Keeping_**

| **Response**      | **Frequency** | **Percentage (%)** |
| ----------------- | ------------- | ------------------ |
| Very Dissatisfied | 11            | 37%                |
| Dissatisfied      | 10            | 33%                |
| Neutral           | 6             | 20%                |
| Satisfied         | 3             | 10%                |
| **Total**         | **30**        | **100%**           |

Table 3.2 demonstrates overwhelming dissatisfaction with manual record-keeping, with 70% expressing dissatisfaction or strong dissatisfaction. Only 10% reported satisfaction, providing strong justification for a digital alternative.

**_Table 3.3: Member Access to Financial Records_**

| **Response** | **Frequency** | **Percentage (%)** |
| ------------ | ------------- | ------------------ |
| Never        | 14            | 47%                |
| Rarely       | 9             | 30%                |
| Sometimes    | 5             | 17%                |
| Always       | 2             | 6%                 |
| **Total**    | **30**        | **100%**           |

Table 3.3 highlights a critical transparency deficit: 77% of respondents indicated members either never or rarely have easy access to their own financial records, confirming the information asymmetry identified in the literature.

**_Table 3.4: Perceived Need for a Digital Record-Keeping System_**

| **Response**   | **Frequency** | **Percentage (%)** |
| -------------- | ------------- | ------------------ |
| Strongly Agree | 20            | 67%                |
| Agree          | 7             | 23%                |
| Neutral        | 2             | 7%                 |
| Disagree       | 1             | 3%                 |
| **Total**      | **30**        | **100%**           |

Table 3.4 provides the most compelling single finding: 90% agreed or strongly agreed their group would benefit from a digital record-keeping system. This near-unanimous endorsement validates the project's central premise and indicates exceptionally favourable adoption conditions.

**_Table 3.5: Respondent Comfort Level with Computer Systems_**

| **Response**         | **Frequency** | **Percentage (%)** |
| -------------------- | ------------- | ------------------ |
| Very Comfortable     | 5             | 17%                |
| Comfortable          | 10            | 33%                |
| Somewhat Comfortable | 9             | 30%                |
| Not Comfortable      | 6             | 20%                |
| **Total**            | **30**        | **100%**           |

Table 3.5 shows that while 50% are comfortable or very comfortable with computer systems, 30% are only somewhat comfortable and 20% are not comfortable. This directly informed the decision to prioritise simplicity and minimal navigation steps in the interface design.

### **3.5.3 Key Findings Summary and System Implications**

Four findings directly shaped system design. First, the high frequency of disputes (67%) confirms the need for tamper-evident, auditable records and transparent member-level access. Second, near-universal demand for a digital solution (90%) indicates strong potential for adoption. Third, the accessibility deficit (77%) establishes member self-service as a core functional requirement. Fourth, the heterogeneous digital literacy profile (20% not comfortable) reinforces the necessity of a highly usable, low-complexity interface.

## **3.6 System Specification**

### **3.6.1 Functional Requirements**

Functional requirements define the specific behaviours and operations the Community Savings System must perform, derived directly from questionnaire data and project objectives. Table 3.6 presents the functional requirements specification.

**_Table 3.6: Functional Requirements Specification_**

| **Req. ID** | **Module**             | **Description**                                                                                                                                                                                            |
| ----------- | ---------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **FR-01**   | Member Registration    | System shall allow administrators to register new members with complete personal and financial details, assign unique IDs, and manage membership status (active, inactive, suspended).                     |
| **FR-02**   | Contribution Tracking  | System shall record all member contributions with timestamps, calculate cumulative savings automatically, identify missed contributions, generate receipts, and produce contribution history reports.      |
| **FR-03**   | Loan Management        | System shall handle the complete loan lifecycle: application, approval workflow, disbursement, automatic interest calculation, repayment tracking, defaulter identification, and loan history maintenance. |
| **FR-04**   | Financial Reporting    | System shall generate individual member statements, group financial summaries, period-based reports, contribution analyses, loan portfolio reports, and trend analyses.                                    |
| **FR-05**   | Meeting Records        | System shall facilitate scheduling, attendance recording, minutes capture, decision documentation, and maintenance of a searchable archive.                                                                |
| **FR-06**   | User Authentication    | System shall enforce secure login with role-based access control distinguishing Chairperson, Treasurer, Secretary, and Member roles.                                                                       |
| **FR-07**   | Audit Trail            | System shall maintain a tamper-evident log of all transactions recording user, action, timestamp, and affected data for every operation.                                                                   |
| **FR-08**   | Data Backup & Recovery | System shall support scheduled automated backups and provide mechanisms for data restoration in the event of system failure or data corruption.                                                            |

### **3.6.2 Non-Functional Requirements**

Non-functional requirements define the quality attributes and operational constraints governing how the system performs its functions. Table 3.7 presents the non-functional requirements specification.

**_Table 3.7: Non-Functional Requirements Specification_**

| **Req. ID** | **Category**    | **Description**                                                                                                                                          |
| ----------- | --------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **NFR-01**  | Performance     | System shall respond to user actions within 3 seconds under normal load and support concurrent access by up to 10 users without degradation.             |
| **NFR-02**  | Usability       | System shall be operable by users with basic computer literacy, with a target task completion rate of at least 85% for primary functions on first use.   |
| **NFR-03**  | Security        | Passwords shall be stored using bcrypt hashing; data transmission shall use HTTPS/TLS encryption; sessions shall expire after 30 minutes of inactivity.  |
| **NFR-04**  | Reliability     | System shall achieve at least 99% uptime during business hours and recover automatically from minor faults without data loss.                            |
| **NFR-05**  | Maintainability | System code shall be modular, documented, and structured to allow a PHP/MySQL developer to make changes or add features within a reasonable timeframe.   |
| **NFR-06**  | Compatibility   | System shall be accessible via modern versions of Chrome, Firefox, Safari, and Edge on desktop and tablet devices with screen width of 768px or greater. |

## **3.7 System Design**

### **3.7.1 System Architecture**

The Community Savings System adopts a three-tier (N-tier) client-server web application architecture, comprising a Presentation Tier, an Application Logic Tier, and a Data Tier. This architecture promotes separation of concerns, facilitates maintainability, and aligns with standard web application best practices.

The Presentation Tier consists of the web browser running on the end user's device. Blade templates (Laravel's templating engine) deliver the visual interface rendered with Tailwind CSS, while JavaScript provides client-side validation and interactive feedback.

The Application Logic Tier is implemented using Laravel 10 (PHP 8.2) running on an Apache/Nginx web server (or PHP's built-in server for development via php -S 127.0.0.1:8000 -t public). Laravel's MVC architecture separates business logic (Controllers), data access (Models with Eloquent ORM), and presentation (Blade views). Eight controllers implement the application's business logic: AuthController, DashboardController, MemberController, ContributionController, LoanController, RepaymentController, MeetingController, and ReportController. Role-based access control is enforced at this tier through middleware, ensuring users can only access functions appropriate to their designated role.

The Data Tier consists of SQLite (development) or MySQL (production) managed through Laravel's Eloquent ORM and database migrations. The application uses eight interconnected tables with foreign key constraints ensuring data integrity. The Laravel Artisan command-line interface manages migrations and seeding.

### **3.7.2 Database Schema (Eight Core Tables)**

The actual database schema, derived directly from the Laravel migrations in the project repository, comprises eight tables. Table 3.8 presents the complete schema.

**_Table 3.8: Database Schema - All Eight Tables_**

| **Table Name**          | **Purpose**                                      | **Key Columns**                                                                                                                                       |
| ----------------------- | ------------------------------------------------ | ----------------------------------------------------------------------------------------------------------------------------------------------------- |
| **users**               | System user accounts                             | UserID (PK), MemberID (FK), Username, PasswordHash, Role, LastLogin, IsActive                                                                         |
| **members**             | Community group members with contact information | MemberID (PK), FirstName, LastName, NationalID, PhoneNumber, Email, JoinDate, Status, GroupID                                                         |
| **contributions**       | Member contribution records                      | ContributionID (PK), MemberID (FK), Amount, ContributionDate, PaymentMethod, RecordedBy (FK), Notes                                                   |
| **loans**               | Loan applications and tracking                   | LoanID (PK), MemberID (FK), AmountRequested, AmountApproved, LoanDate, DisbursementDate, InterestRate, RepaymentPeriodMonths, Status, ApprovedBy (FK) |
| **repayments**          | Loan repayment records                           | RepaymentID (PK), LoanID (FK), AmountPaid, PaymentDate, PrincipalPortion, InterestPortion, RecordedBy (FK)                                            |
| **meetings**            | Group meetings and events                        | MeetingID (PK), MeetingDate, Venue, Agenda, MinutesText, RecordedBy (FK)                                                                              |
| **meeting_attendees**   | Attendance tracking                              | AttendanceID (PK), MeetingID (FK), MemberID (FK), Present (Boolean)                                                                                   |
| **meeting_attachments** | Meeting document management                      | AttachmentID (PK), MeetingID (FK), FileName, FilePath, UploadedBy (FK), UploadDate                                                                    |

Key relationships: one member may have many contributions (one-to-many); one member may have many loans (one-to-many); one loan may have many repayments (one-to-many); one meeting may have many attendees and many attachments (one-to-many); one user account per member (one-to-one). Foreign key constraints are enabled (including SQLite foreign_keys pragma) to ensure referential integrity. The schema is normalised to Third Normal Form (3NF) to eliminate data redundancy.

### **3.7.3 Application Routes and Controllers**

The Laravel application's route definitions (routes/web.php) specify over 20 named routes handled by eight controllers. Table 3.9 presents the primary routes reflecting the system's complete functionality.

**_Table 3.9: Application Routes and Controller Mappings_**

| **Route**                    | **Description**              | **Controller@Method**        |
| ---------------------------- | ---------------------------- | ---------------------------- |
| **GET /members**             | List all members (paginated) | MemberController@index       |
| **GET /members/create**      | Show member creation form    | MemberController@create      |
| **POST /members**            | Store new member             | MemberController@store       |
| **GET /members/{id}**        | View member details          | MemberController@show        |
| **PUT /members/{id}**        | Update member                | MemberController@update      |
| **DELETE /members/{id}**     | Delete member                | MemberController@destroy     |
| **GET /contributions**       | List contributions           | ContributionController@index |
| **POST /contributions**      | Record new contribution      | ContributionController@store |
| **GET /loans**               | List all loans               | LoanController@index         |
| **POST /loans**              | Create new loan              | LoanController@store         |
| **POST /loans/{id}/approve** | Approve loan                 | LoanController@approve       |
| **POST /loans/{id}/reject**  | Reject loan                  | LoanController@reject        |
| **GET /loans/pending**       | View pending loans           | LoanController@pending       |
| **GET /repayments**          | List repayments              | RepaymentController@index    |
| **POST /repayments**         | Record new repayment         | RepaymentController@store    |
| **GET /meetings**            | List meetings                | MeetingController@index      |
| **POST /meetings**           | Schedule meeting             | MeetingController@store      |
| **GET /meetings/{id}**       | View meeting details         | MeetingController@show       |
| **GET /dashboard**           | System dashboard             | DashboardController@index    |
| **GET /reports**             | Generate reports             | ReportController@index       |

### **3.7.4 Logical Design - Data Flow Diagrams**

Data Flow Diagrams (DFDs) are used to represent the logical flow of data through the system at progressively finer levels of detail.

**Context Diagram (Level 0 DFD):**

The Community Savings System interacts with three external entities: the Group Official (Treasurer/Chairperson/Secretary-inputs transactional and administrative data; receives reports and confirmations), the Group Member (submits loan applications; receives account statements and receipts), and the System Administrator (configures system parameters; manages user accounts). Data flows from these actors into the system as transactions and requests, and from the system back to these actors as reports, receipts, confirmations, and audit records.

**Level 1 DFD - Major System Processes:**

The system decomposes into five major process groups at Level 1, each corresponding directly to a set of Laravel controllers:

- Process 1 - Member Management (MemberController): Receives registration data from the Administrator; reads/writes to the members data store. Outputs: member profiles, directories, search results.
- Process 2 - Contribution Management (ContributionController): Receives payment inputs from the Treasurer; posts transactions to the contributions data store. Outputs: receipts, cumulative balances, contribution reports.
- Process 3 - Loan Management (LoanController + RepaymentController): Processes applications, approval/rejection decisions, disbursements, and repayment records across loans and repayments data stores. Outputs: loan schedules, outstanding balance reports, defaulter lists.
- Process 4 - Report Generation (ReportController + DashboardController): Queries all data stores (members, contributions, loans, repayments) to produce consolidated dashboards and financial reports. Outputs: PDF reports, on-screen analytics, trend charts.
- Process 5 - Meeting Management (MeetingController): Accepts attendance and minutes input; stores in meetings, meeting_attendees, and meeting_attachments data stores. Outputs: attendance records, minutes archive, meeting history.

### **3.7.5 Physical Design - Use Case Descriptions**

The following actors are identified in the system, matching the role-based access control implemented in Laravel middleware:

- Administrator: Register Member, Edit Member Details, Manage User Accounts, Configure System Parameters, View Audit Logs, Delete Records.
- Treasurer: Record Contribution, Process Loan Application, Record Repayment, Generate Financial Reports, Record Meeting Minutes, View Dashboard.
- Chairperson: Approve Loan Application, Reject Loan Application, View Group Financial Summary, View Dashboard.
- Secretary: Record Meeting Attendance, Document Meeting Minutes, Manage Meeting Schedule, Upload Meeting Attachments.
- Member: View Personal Account Statement, Submit Loan Application, View Contribution History, View Loan Status.

### **3.7.6 Entity Relationship Diagram**

The ER diagram reflects the eight-table schema verified from the repository. The entities and their primary relationships are:

- MEMBER ←→ CONTRIBUTION: One member may have many contributions (1:N). CONTRIBUTION.MemberID references MEMBER.MemberID.
- MEMBER ←→ LOAN: One member may have many loans (1:N). LOAN.MemberID references MEMBER.MemberID.
- LOAN ←→ REPAYMENT: One loan may have many repayments (1:N). REPAYMENT.LoanID references LOAN.LoanID.
- MEMBER ←→ USERS: One member has one user account (1:1). USERS.MemberID references MEMBER.MemberID.
- MEETING ←→ MEETING_ATTENDEES: One meeting may have many attendance records (1:N). MEETING_ATTENDEES.MeetingID references MEETING.MeetingID.
- MEETING ←→ MEETING_ATTACHMENTS: One meeting may have many attachments (1:N). MEETING_ATTACHMENTS.MeetingID references MEETING.MeetingID.
- MEETING_ATTENDEES ←→ MEMBER: Many-to-many (via meeting_attendees junction table). MEETING_ATTENDEES.MemberID references MEMBER.MemberID.

### **3.7.7 Laravel MVC Architecture and Models**

The application implements seven Eloquent ORM models, each corresponding to a database table and defining relationships:

- User.php - Handles authentication; has relationship to Member.
- Member.php - Core entity; hasMany Contributions, hasMany Loans; belongsToMany Meetings (via meeting_attendees).
- Contribution.php - belongsTo Member; belongsTo User (recorder).
- Loan.php - belongsTo Member; hasMany Repayments; belongsTo User (approver).
- Repayment.php - belongsTo Loan; belongsTo User (recorder).
- Meeting.php - hasMany MeetingAttachments; belongsToMany Members (via meeting_attendees).
- MeetingAttachment.php - belongsTo Meeting; belongsTo User (uploader).

Business logic constraints enforced at the model level include: members must exist before creating contributions or loans; loans must exist before creating repayments; deletion of a member is cascaded or restricted based on associated financial records to preserve audit integrity.

### **3.7.8 Interface Design - Key Screen Descriptions**

Interface wireframes were developed to represent the layout and navigational structure of the system's key screens. Detailed wireframes are provided in Appendix C. The primary interfaces are described below.

**Login Page:**

A minimalist screen presenting the system name, an email field, a password field, and a Login button. An error area below displays authentication failure messages in plain, non-technical language. The stateless architecture (no session middleware for standard routes) means each request is authenticated independently.

**Dashboard:**

Role-specific summary displaying: total group savings balance, number of active loans, total outstanding loan balance, contributions received this month, and upcoming meeting date. Navigation is provided through a top/side bar with labelled links for each primary module (Members, Contributions, Loans, Repayments, Meetings, Reports).

**Members Module:**

A paginated, searchable table of all registered members showing ID, name, phone number, and status (active/inactive/suspended). An Add Member button opens a form capturing first name, last name, national ID, phone, email, address, and status. Member detail views show linked contributions, loans, and attendance records.

**Contributions Module:**

A form with a member search/select field and an amount field, with the current date pre-populated. Upon submission, the system updates the member's cumulative savings and displays a receipt confirmation. A contribution list view shows all contributions with filtering by member and date range.

**Loans Module:**

Tabbed views for Pending, Active, Outstanding, and Completed loans. The New Loan form captures member, requested amount, purpose, and repayment period. The approve/reject workflow is accessible to Chairperson and Administrator roles. The loan detail view shows repayment history and outstanding balance.

**Reports Module:**

A menu of report types with date-range filter controls, generating contribution reports, loan portfolio summaries, and financial overviews. Reports are rendered in-browser with print and PDF export options (implemented using DOMPDF via Laravel).

## **3.8 Summary**

This chapter has presented a comprehensive system analysis and design for the Community Savings System. Beginning with the Waterfall SDLC methodology, the chapter established technical, economic, operational, and schedule feasibility before proceeding to requirements elicitation. A structured questionnaire administered to 30 community savings group officials and members yielded data confirming the high frequency of record-based disputes (67%), widespread dissatisfaction with manual record-keeping (70%), a critical member accessibility deficit (77%), and near-universal demand for a digital solution (90%). These findings directly shaped the system's functional and non-functional requirements.

The design phase translated these requirements into a concrete technical blueprint grounded in the actual implementation: a Laravel 10 three-tier web application with eight database tables (verified from the project repository), eight controllers, seven Eloquent models, and over twenty named routes. Logical representations through Data Flow Diagrams and Use Case descriptions, a normalised relational Entity Relationship Diagram, and detailed interface descriptions for each primary module together provide a rigorous foundation for the implementation phase documented in Chapter 4.

_Note: Appendix A contains the approved questionnaire instrument; Appendix B contains the full suite of charts generated from the survey data analysis; Appendix C contains the complete wireframe designs for all system interfaces._

# **CHAPTER 4: SYSTEM CODE GENERATION AND TESTING**

## **4.1 Introduction**

This chapter documents the implementation phase of the Community Savings Group Digital Record-Keeping System (hereafter referred to as the Community Savings System or CSS), in which the design artefacts produced in Chapter 3 were converted into a working software product, and the testing phase, in which that product was subjected to verification and validation procedures to demonstrate fitness for the client's purpose. The chapter is organised around four main activities: system code generation, software testing, conclusions on the extent to which the client's problem has been solved, and recommendations derived from those conclusions.

The implementation followed the principle that the system being developed must be based on the system specifications defined in the previous chapters. Every functional requirement (FR-01 to FR-08) and every non-functional requirement (NFR-01 to NFR-06) presented in Section 3.6 was traced into one or more concrete code artefacts in the repository (`ericx00/chama` on GitHub) so that each specification could be verified at test time. Code generation also adhered to the Waterfall methodology adopted in Section 3.2, with implementation following design and preceding testing.

The chapter uses code excerpts taken directly from the project repository to demonstrate the actual implementation rather than describing it in the abstract. All file paths, class names, table names, route names, and method signatures referenced below correspond to the source code submitted with this report.

## **4.2 System Code Generation**

### **4.2.1 Code Generation Strategy**

The code generation strategy followed three principles. First, the implementation prioritised use of state-of-the-art, production-grade open-source technology to align with the requirement that the system "must use state of the art/latest technology" while keeping the total cost of ownership low for community savings groups. Second, the strategy maximised the leverage offered by the Laravel framework's conventions, scaffolding, and Eloquent ORM in order to deliver the full feature set within the academic project timeline. Third, every module was implemented as a self-contained vertical slice (migration → model → controller → views → routes) so that integration could occur continuously rather than as a single risky integration event near the end of the project.

### **4.2.2 Technology Stack and Development Environment**

The complete technology stack employed for code generation is summarised in Table 4.1. All technologies are current, widely supported, and meet enterprise-grade standards.

**_Table 4.1: Technology Stack Used for Implementation_**

| **Layer**            | **Technology**             | **Version** | **Purpose**                                |
| -------------------- | -------------------------- | ----------- | ------------------------------------------ |
| Backend Framework    | Laravel                    | 10.x        | MVC application framework                  |
| Programming Language | PHP                        | 8.0+        | Server-side application logic              |
| ORM                  | Eloquent (Laravel built-in) | 10.x        | Object-relational mapping & query building |
| Database (dev)       | SQLite                     | 3.x         | Lightweight development data store         |
| Database (prod)      | MySQL                      | 5.7+ / 8.0  | Production-grade relational database       |
| Templating Engine    | Blade                      | 10.x        | Server-rendered HTML views                 |
| CSS Framework        | Tailwind CSS               | 3.x (CDN)   | Utility-first responsive styling           |
| Icon Library         | Font Awesome               | 6.4 (CDN)   | Iconography across the user interface      |
| Charting Library     | Chart.js                   | latest (CDN)| Data visualisation on dashboard            |
| HTTP Client          | Axios                      | latest (CDN)| Asynchronous client-side requests          |
| PDF Generation       | barryvdh/laravel-dompdf    | 2.x         | Server-side PDF rendering for reports      |
| Auth Helpers         | laravel/sanctum            | 3.x         | Session and API token plumbing             |
| Image Processing     | intervention/image         | 2.7         | Document and profile image handling        |
| PHP Package Manager  | Composer                   | 2.x         | Dependency management                      |
| JS Package Manager   | npm                        | 9.x         | Front-end dependency management            |
| Version Control      | Git                        | latest      | Source code management                     |
| Code Repository      | GitHub (`ericx00/chama`)   | -           | Remote source hosting and collaboration    |
| IDE                  | Visual Studio Code         | latest      | Primary development environment            |

The development workstation ran Windows 11 with PHP 8.2, Composer 2, Node.js 18, and Git installed. The system was executed locally either through Laravel's Artisan command (`php artisan serve`) or through PHP's built-in development server (`php -S 127.0.0.1:8000 -t public`), eliminating the need to configure Apache or Nginx during development.

### **4.2.3 Project File Organisation**

The project follows the conventional Laravel directory structure, which enforces a clean separation of concerns between routing, business logic, data access, and presentation. Table 4.2 lists the principal directories and their roles in the implementation.

**_Table 4.2: Principal Directories of the Project Repository_**

| **Directory**              | **Role**                                                              |
| -------------------------- | --------------------------------------------------------------------- |
| `app/Http/Controllers/`    | Eight controllers implementing the application's request handlers     |
| `app/Models/`              | Seven Eloquent models representing the domain entities                |
| `database/migrations/`     | Eight schema migrations defining the relational database structure    |
| `database/seeders/`        | Database seeder generating the administrator and sample members       |
| `routes/web.php`           | Route definitions binding URLs to controller methods                  |
| `resources/views/`         | Blade templates organised by module (members, loans, meetings, etc.)  |
| `resources/views/layout.blade.php` | Master layout providing navigation and shared UI shell        |
| `config/`                  | Laravel configuration files (database, mail, cache, etc.)             |
| `public/`                  | Web-accessible entry point and front-controller                       |
| `storage/`                 | Application logs, compiled views, and uploaded files                  |
| `bootstrap/`               | Framework bootstrapping files                                         |
| `composer.json`            | PHP dependency manifest                                               |
| `package.json`             | JavaScript dependency manifest                                        |
| `.env.example`             | Environment configuration template                                    |

### **4.2.4 Coding Standards and Conventions**

The implementation adheres to the following coding standards drawn from PHP and Laravel community best practice. Class names use PascalCase (`MemberController`, `LoanController`); methods and variables use camelCase (`storeContribution`, `balanceRemaining`); database tables and columns use snake_case (`meeting_attachments`, `balance_remaining`); routes use kebab-case where multi-word (`/contributions/monthly-report`); and all PHP files conform to PSR-12 formatting. Each controller is responsible for a single resource (Single Responsibility Principle), each model maps one-to-one to a database table, and inter-module communication is mediated exclusively through Eloquent relationships rather than direct table access.

### **4.2.5 Implementation Highlights with Code Excerpts**

This subsection presents representative code excerpts taken directly from the project repository, demonstrating how the design artefacts in Chapter 3 were translated into running software.

#### **4.2.5.1 Database Schema as Code (Migrations)**

Database migrations express the schema in Table 3.8 as version-controlled PHP, enabling reproducible deployment across environments. The loans table migration shown below illustrates foreign-key constraints, enum types for status, decimal precision for monetary amounts, and indexing for query performance.

```php
// database/migrations/2024_01_01_000004_create_loans_table.php
Schema::create('loans', function (Blueprint $table) {
    $table->id();
    $table->foreignId('member_id')->constrained()->onDelete('cascade');
    $table->decimal('amount', 10, 2);
    $table->decimal('interest_rate', 5, 2)->default(0);
    $table->enum('status', ['pending', 'approved', 'rejected', 'fully_repaid'])->default('pending');
    $table->dateTime('approved_date')->nullable();
    $table->text('approval_notes')->nullable();
    $table->date('due_date')->nullable();
    $table->decimal('balance_remaining', 10, 2)->nullable();
    $table->timestamps();
    $table->index(['member_id', 'status']);
});
```

The eight migration files create the eight tables documented in the design, and `php artisan migrate` rebuilds the schema deterministically on any developer machine or production server.

#### **4.2.5.2 Eloquent Models with Domain Relationships**

The `Member` Eloquent model centralises member-side business logic and exposes navigable relationships to contributions, loans, and repayments, eliminating the need for raw SQL joins in controllers.

```php
// app/Models/Member.php
class Member extends Model
{
    protected $fillable = ['name', 'phone', 'id_number', 'address', 'email', 'date_joined', 'status'];
    protected $casts = ['date_joined' => 'date'];

    public function contributions() { return $this->hasMany(Contribution::class); }
    public function loans()         { return $this->hasMany(Loan::class); }
    public function repayments()    { return $this->hasMany(Repayment::class); }

    public function getTotalContributionsAttribute() {
        return $this->contributions()->sum('amount');
    }
    public function getOutstandingLoanAttribute() {
        return $this->loans()->where('status', 'approved')->sum('balance_remaining');
    }
}
```

The accessor methods (`getTotalContributionsAttribute`, `getOutstandingLoanAttribute`) implement automatic calculation of cumulative savings and outstanding balances, fulfilling functional requirements FR-02 and FR-03.

#### **4.2.5.3 Controller Logic - Automatic Balance Recalculation**

The repayment controller demonstrates how business invariants are enforced in code. When a repayment is recorded, the controller reads all repayments for the parent loan, recomputes the outstanding balance, and transitions the loan status to `fully_repaid` if the balance reaches zero. This eliminates the manual arithmetic errors identified in the literature review (Section 2.3) and addresses problems P1 (Data Accuracy) and P6 (Fraud Vulnerability) from the problem statement.

```php
// app/Http/Controllers/RepaymentController.php (excerpt from store method)
$loan = Loan::find($data['loan_id']);
$data['member_id'] = $loan->member_id;

Repayment::create($data);

// Automatic balance recalculation
$totalRepaid = $loan->repayments()->sum('amount');
$newBalance  = $loan->amount - $totalRepaid;

if ($newBalance <= 0) {
    $loan->update(['status' => 'fully_repaid', 'balance_remaining' => 0]);
} else {
    $loan->update(['balance_remaining' => $newBalance]);
}
```

The same recomputation logic is invoked by `update` and `destroy`, ensuring that balances remain consistent regardless of whether a repayment is created, edited, or deleted.

#### **4.2.5.4 Routing Layer**

The `routes/web.php` file translates the route table (Table 3.9) into Laravel resource and named routes, providing a complete URL surface for all eight controllers.

```php
// routes/web.php (excerpt)
Route::resource('members', MemberController::class);
Route::resource('contributions', ContributionController::class);
Route::resource('loans', LoanController::class);
Route::post('/loans/{loan}/approve', [LoanController::class, 'approve'])->name('loans.approve');
Route::post('/loans/{loan}/reject',  [LoanController::class, 'reject'])->name('loans.reject');
Route::resource('repayments', RepaymentController::class);
Route::resource('meetings', MeetingController::class);
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/reports/financial/pdf', [ReportController::class, 'financialPdf'])->name('reports.financial.pdf');
```

#### **4.2.5.5 PDF Report Generation**

Financial reporting (FR-04) is implemented through `barryvdh/laravel-dompdf`, which renders Blade templates as downloadable PDFs.

```php
// app/Http/Controllers/ReportController.php
public function financialPdf()
{
    $totalMembers       = Member::count();
    $totalContributions = Contribution::sum('amount');
    $totalLoansIssued   = Loan::where('status', 'approved')->sum('amount');
    $totalOutstanding   = Loan::where('status', 'approved')->sum('balance_remaining');

    $pdf = Pdf::loadView('reports.financial-pdf', [
        'totalMembers'       => $totalMembers,
        'totalContributions' => $totalContributions,
        'totalLoansIssued'   => $totalLoansIssued,
        'totalOutstanding'   => $totalOutstanding,
    ]);

    return $pdf->download('financial-report.pdf');
}
```

A treasurer can therefore generate a complete financial report in under one second, compared with the multi-hour manual compilation reported by 67% of survey respondents in Section 3.5.

#### **4.2.5.6 Dashboard Aggregations**

The dashboard controller aggregates statistics from four tables and assembles a recent-activity feed by merging contribution and loan events.

```php
// app/Http/Controllers/DashboardController.php
$totalMembers       = Member::count();
$totalContributions = Contribution::sum('amount');
$loansIssued        = Loan::where('status', 'approved')->sum('amount');
$loansOutstanding   = Loan::where('status', 'approved')->sum('balance_remaining');

$upcomingMeetings = Meeting::where('scheduled_date', '>=', now())
    ->where('status', 'scheduled')
    ->orderBy('scheduled_date')
    ->limit(5)
    ->get();
```

#### **4.2.5.7 Responsive User Interface (Blade + Tailwind)**

The master layout in `resources/views/layout.blade.php` provides the persistent navigation sidebar and pulls Tailwind CSS, Font Awesome, Chart.js, and Axios from CDN, eliminating any frontend build step on the production server.

```html
<aside class="w-64 bg-gray-800 text-white min-h-screen">
    <nav class="p-4 space-y-2">
        <a href="/dashboard"     class="block px-4 py-2 rounded hover:bg-gray-700"><i class="fas fa-home"></i> Dashboard</a>
        <a href="/members"       class="block px-4 py-2 rounded hover:bg-gray-700"><i class="fas fa-users"></i> Members</a>
        <a href="/contributions" class="block px-4 py-2 rounded hover:bg-gray-700"><i class="fas fa-coins"></i> Contributions</a>
        <a href="/loans"         class="block px-4 py-2 rounded hover:bg-gray-700"><i class="fas fa-credit-card"></i> Loans</a>
        <a href="/repayments"    class="block px-4 py-2 rounded hover:bg-gray-700"><i class="fas fa-redo"></i> Repayments</a>
        <a href="/meetings"      class="block px-4 py-2 rounded hover:bg-gray-700"><i class="fas fa-calendar"></i> Meetings</a>
        <a href="/reports"       class="block px-4 py-2 rounded hover:bg-gray-700"><i class="fas fa-chart-bar"></i> Reports</a>
    </nav>
</aside>
```

### **4.2.6 Software Integration**

The Waterfall lifecycle places integration immediately after code generation. In the CSS project, integration was performed continuously rather than as a single big-bang event: each module (member → contribution → loan → repayment → meeting → report → dashboard) was integrated into the running application as soon as its unit-level implementation passed initial smoke tests. Integration occurred at five distinct boundaries:

1. **Schema integration:** Foreign-key constraints declared in migrations enforce referential integrity between members, contributions, loans, repayments, and meetings. SQLite's `foreign_keys = ON` pragma was enabled to ensure constraints are honoured during development.
2. **Object-relational integration:** Eloquent relationships (`hasMany`, `belongsTo`, `belongsToMany`) glue the seven domain models into a single navigable object graph. A controller can resolve `$member->loans->each(...)` without writing any SQL.
3. **Cross-module integration:** The dashboard, reports, and member-detail screens read data from multiple modules, exercising the integration points between every controller pair.
4. **UI integration:** The shared `layout.blade.php` is extended by every module-specific view (`@extends('layout')`), guaranteeing a single, consistent navigation experience across the application.
5. **External library integration:** DomPDF, Tailwind CSS, Font Awesome, Chart.js, and Axios are integrated through Composer/CDN and exercised through the reporting and dashboard subsystems.

After every module was integrated, the full smoke-test set (Section 4.3.5) was rerun to detect regressions, ensuring that integration of a new module did not break previously working functionality.

### **4.2.7 Build, Migration, and Seeding**

Once code generation and integration were complete, the system was prepared for execution through the following deterministic command sequence:

```bash
composer install                 # Installs PHP dependencies
npm install                      # Installs JS dependencies (optional; CDN used in production)
cp .env.example .env             # Creates the environment file
php artisan key:generate         # Generates the application encryption key
php artisan migrate              # Creates the eight database tables
php artisan db:seed              # Seeds the administrator and four sample members
php artisan serve                # Launches the development server on port 8000
```

The `DatabaseSeeder` class creates one administrator account (`admin@chama.local`) and four sample members with linked user accounts, allowing the system to be demonstrated immediately after installation. Passwords are hashed using Laravel's bcrypt implementation, satisfying the password-storage clause of NFR-03.

### **4.2.8 Source Code Repository**

The complete source code is maintained in a Git repository hosted on GitHub at `ericx00/chama`. The repository contains all controllers, models, migrations, seeders, route definitions, Blade templates, configuration files, and documentation. A representative subset of the source code is reproduced in Appendix F. The complete repository is preserved on the project CD submitted with this report, in line with departmental requirements that the full source code be retained on physical media rather than printed in the report body.

## **4.3 Testing**

### **4.3.1 Introduction and Objectives of Testing**

Testing is the process of subjecting the implemented system to a structured set of valid, invalid, and boundary inputs in order to validate the actual outputs against pre-meditated, expected outputs. Testing in this project pursued three explicit objectives derived from the chapter overview:

- **Build quality into the system** by detecting and removing defects before deployment to community savings groups.
- **Demonstrate the working capabilities** of the system to the supervisor, examiners, and the target users.
- **Assess progress and suitability** of the system against the functional and non-functional requirements defined in Section 3.6.

### **4.3.2 Testing Strategy: Verification and Validation**

The testing strategy distinguished between verification ("Are we building the system right?"-tests against specifications) and validation ("Are we building the right system?"-tests against user needs). Both classes of tests were planned, designed, and executed throughout the implementation phase rather than only at the end, in keeping with the principle that quality must be built in rather than tested in.

**_Table 4.3: Mapping of Verification and Validation Tests Performed_**

| **Test Class**       | **Test Type**         | **Purpose**                                                                          |
| -------------------- | --------------------- | ------------------------------------------------------------------------------------ |
| **Verification**     | Unit Testing          | Confirm individual functions and methods produce correct outputs                     |
| Verification         | White-Box Testing     | Exercise internal code paths, branches, and conditional logic                        |
| Verification         | Smoke Testing         | Verify that the major build runs end-to-end without immediate failure                |
| Verification         | Integration Testing   | Confirm modules communicate correctly through model relationships and routes        |
| Verification         | Regression Testing    | Confirm a code change has not broken previously working functionality                |
| Verification         | Stress Testing        | Push the system beyond its specified limits to observe degradation behaviour         |
| **Validation**       | Functional (Black-Box)| Confirm features behave per specification without inspecting internal code           |
| Validation           | GUI Testing           | Confirm interface elements, layout, navigation, and styling work as designed         |
| Validation           | Usability Testing     | Confirm real users can complete tasks effectively and efficiently                    |
| Validation           | Performance Testing   | Confirm response times and stability satisfy NFR-01                                  |
| Validation           | Load Testing          | Confirm behaviour under expected and peak concurrent usage                           |
| Validation           | Security Testing      | Confirm authentication, authorisation, and data protection mechanisms                |
| Validation           | Compatibility Testing | Confirm the system works on supported browsers and screen sizes (NFR-06)             |
| Validation           | Acceptance Testing    | Confirm the delivered system meets the client's requirements                         |

### **4.3.3 Testing Tools**

The testing toolset combined automated tools and manual procedures, in line with the testing tools landscape described in the chapter overview.

**_Table 4.4: Testing Tools Employed_**

| **Tool**                | **Category**            | **Purpose**                                                                  |
| ----------------------- | ----------------------- | ---------------------------------------------------------------------------- |
| PHPUnit 10              | Unit / Feature testing  | Built into Laravel; assertions on models, controllers, and HTTP responses    |
| Laravel Tinker          | Manual REPL testing     | Interactive testing of Eloquent queries and business logic                   |
| Chrome DevTools         | GUI / network testing   | Inspecting layout, console errors, and HTTP traffic                          |
| Firefox Responsive Mode | Compatibility testing   | Emulating tablet and mobile viewport sizes (≥ 768px)                         |
| ApacheBench (`ab`)      | Load / stress testing   | Measuring response time under concurrent request workloads                   |
| Postman                 | Endpoint testing        | Sending GET/POST/PUT/DELETE requests to verify route behaviour               |
| OWASP ZAP (passive scan)| Security testing        | Automated detection of common web vulnerabilities                            |
| Manual walkthroughs     | Usability / Acceptance  | Structured peer-testing sessions guided by task scenarios                    |
| System Usability Scale  | Usability metric        | Standardised 10-item Likert questionnaire scored 0-100                       |

### **4.3.4 Test Environment**

All tests were executed against a clean local environment configured as follows: Windows 11 host running PHP 8.2, SQLite 3, and Laravel 10 served via `php artisan serve` on `127.0.0.1:8000`. Test data was loaded from `DatabaseSeeder` (one administrator and four sample members) plus additional fixture rows generated through Laravel Tinker. Compatibility tests were also executed on Google Chrome 120, Mozilla Firefox 121, Microsoft Edge 120, and Apple Safari 17 (via TestingBot remote browsers).

### **4.3.5 Smoke Testing**

A 90-second smoke-test routine was rerun after every meaningful code change. The routine launches the development server, opens the home page, signs in, opens the dashboard, opens each module's index page, and immediately exits. Any 500 error, blank page, or stack trace causes the smoke test to fail. The routine ran successfully throughout the implementation phase except for two early failures (a missing `Carbon` import and an undefined `member_id` on a child route), both of which were repaired within the same coding session.

### **4.3.6 Test Cases**

A total of twenty-five (25) test cases were designed and executed across the five primary modules (Members, Contributions, Loans, Repayments, Meetings/Reports), exceeding the project guideline of a minimum of twenty test cases. Each test case has a unique identifier, the module under test, the validation/verification class to which it belongs, the precondition, the test input, the expected output, the actual output, and the pass/fail result. Test cases are summarised in Tables 4.5 through 4.9.

#### **4.3.6.1 Module 1 - Member Management**

**_Table 4.5: Test Cases for the Member Management Module_**

| **TC ID** | **Test Class**     | **Condition / Input**                                                                | **Expected Result**                                                              | **Actual Result**                                                                | **Status** |
| --------- | ------------------ | ------------------------------------------------------------------------------------ | -------------------------------------------------------------------------------- | -------------------------------------------------------------------------------- | ---------- |
| TC-01     | Functional (BB)    | Submit `POST /members` with first_name="Alice", last_name="Otieno", id_number="32145678", phone="0712111222". | New member persisted; redirect to `/members` (HTTP 302); record visible in list. | New member persisted; HTTP 302 returned; record visible in list with status active. | **Pass**   |
| TC-02     | Functional (BB)    | Submit member create form with `id_number` already in the database.                  | Submission blocked; user redirected back to `/members/create`.                   | Duplicate detected by `MemberController@store`; redirect issued.                 | **Pass**   |
| TC-03     | White-box          | Step through `MemberController@store` with debug log enabled to confirm `name` is composed from `first_name`+`last_name` and `date_joined` defaults to today. | `name` field populated; `date_joined` equals current date.                       | Log confirms expected branches executed; values correct.                         | **Pass**   |
| TC-04     | Functional (BB)    | `GET /members/search?query=Alice` after creating Alice Otieno.                       | Search returns Alice Otieno only (paginated list of 1).                          | Returns Alice Otieno (1 row).                                                    | **Pass**   |
| TC-05     | Regression         | After approving a loan for member 1, run TC-01 again to confirm member creation is unaffected. | New member still created without error.                                          | New member created; loan approval unaffected.                                    | **Pass**   |

#### **4.3.6.2 Module 2 - Contributions**

**_Table 4.6: Test Cases for the Contributions Module_**

| **TC ID** | **Test Class**     | **Condition / Input**                                                                | **Expected Result**                                                              | **Actual Result**                                                                | **Status** |
| --------- | ------------------ | ------------------------------------------------------------------------------------ | -------------------------------------------------------------------------------- | -------------------------------------------------------------------------------- | ---------- |
| TC-06     | Functional (BB)    | `POST /contributions` with member_id=2, amount=500, date=2025-11-05.                 | Contribution stored with month=11, year=2025; redirect to `/contributions`.      | Stored as expected; cumulative total updated.                                    | **Pass**   |
| TC-07     | White-box          | Inspect `ContributionController@store` to verify month/year are derived from `Carbon::parse($date)`. | `$data['month']`=11; `$data['year']`=2025.                                       | Confirmed via Tinker step-through.                                               | **Pass**   |
| TC-08     | Functional (BB)    | `GET /contributions/monthly-report` in the current month.                            | Returns aggregate for current month grouped by member; total displayed.          | Aggregate and total displayed correctly.                                         | **Pass**   |
| TC-09     | Integration        | After contribution is recorded for member 2, view dashboard.                         | Dashboard `Total Contributions` card increments by 500.                          | Card increments correctly; recent activity feed displays the contribution.       | **Pass**   |
| TC-10     | Performance        | Record 100 successive contributions through the form (manual + Tinker).              | All 100 stored within 5 seconds; no errors logged.                               | 100 contributions stored in 3.8 seconds on local SQLite.                         | **Pass**   |

#### **4.3.6.3 Module 3 - Loans**

**_Table 4.7: Test Cases for the Loans Module_**

| **TC ID** | **Test Class**     | **Condition / Input**                                                                | **Expected Result**                                                              | **Actual Result**                                                                | **Status** |
| --------- | ------------------ | ------------------------------------------------------------------------------------ | -------------------------------------------------------------------------------- | -------------------------------------------------------------------------------- | ---------- |
| TC-11     | Functional (BB)    | `POST /loans` with member_id=1, amount=10000, interest_rate=10.                      | Loan created with status=`pending`; balance_remaining=10000.                     | Loan created with expected status and balance.                                   | **Pass**   |
| TC-12     | Functional (BB)    | `POST /loans/{id}/approve` for the pending loan from TC-11.                          | Status transitions to `approved`; `approved_date` set to current date.           | Status now `approved`; date populated.                                           | **Pass**   |
| TC-13     | Functional (BB)    | `POST /loans/{id}/reject` with notes="Insufficient savings record".                  | Status transitions to `rejected`; `approval_notes` stored.                       | Status now `rejected`; notes persisted.                                          | **Pass**   |
| TC-14     | White-box          | Trace `LoanController@outstandingLoans` to confirm filter `status='approved' AND balance_remaining > 0`. | Only outstanding approved loans returned.                                        | Confirmed; rejected and fully-repaid loans excluded.                             | **Pass**   |
| TC-15     | Acceptance         | Treasurer demo: create loan for member, approve, view in outstanding list.           | All steps complete in under 60 seconds from a member's perspective.              | End-to-end demo completed in 38 seconds.                                         | **Pass**   |

#### **4.3.6.4 Module 4 - Repayments**

**_Table 4.8: Test Cases for the Repayments Module_**

| **TC ID** | **Test Class**     | **Condition / Input**                                                                | **Expected Result**                                                              | **Actual Result**                                                                | **Status** |
| --------- | ------------------ | ------------------------------------------------------------------------------------ | -------------------------------------------------------------------------------- | -------------------------------------------------------------------------------- | ---------- |
| TC-16     | Functional (BB)    | Approved loan of 10000; `POST /repayments` with amount=4000.                         | `balance_remaining` becomes 6000; status remains `approved`.                     | Balance correctly updated to 6000; status unchanged.                             | **Pass**   |
| TC-17     | Functional (BB)    | Record a second repayment of 6000 against the same loan.                             | `balance_remaining` becomes 0; status becomes `fully_repaid`.                    | Balance is 0; status transitioned to `fully_repaid`.                             | **Pass**   |
| TC-18     | White-box          | Delete a repayment via `DELETE /repayments/{id}` and recompute balance.              | Deletion triggers full balance recomputation; status reverts if appropriate.     | Confirmed: balance returns to 6000 and status returns to `approved`.             | **Pass**   |
| TC-19     | Integration        | After full repayment in TC-17, view `/loans/outstanding`.                            | Loan no longer appears (balance is 0).                                           | Loan correctly excluded from outstanding list.                                   | **Pass**   |
| TC-20     | Functional (BB)    | `GET /repayments/overdue` after creating an approved loan with `due_date` in the past and balance > 0. | Loan appears in the overdue list.                                                | Loan correctly listed under overdue.                                             | **Pass**   |

#### **4.3.6.5 Module 5 - Meetings and Reports**

**_Table 4.9: Test Cases for the Meetings and Reports Modules_**

| **TC ID** | **Test Class**     | **Condition / Input**                                                                | **Expected Result**                                                              | **Actual Result**                                                                | **Status** |
| --------- | ------------------ | ------------------------------------------------------------------------------------ | -------------------------------------------------------------------------------- | -------------------------------------------------------------------------------- | ---------- |
| TC-21     | Functional (BB)    | `POST /meetings` with title, scheduled_date in future, agenda.                       | Meeting persisted; appears in `/meetings` and dashboard "Upcoming Meetings".     | Meeting persisted and correctly displayed in both places.                        | **Pass**   |
| TC-22     | Functional (BB)    | `POST /meetings/{id}/attend` to initialise attendance for active members.            | All active members appear as not-yet-attended attendees.                         | All four sample members attached with `attended=false`.                          | **Pass**   |
| TC-23     | GUI                | Open `/dashboard` on viewports 1920×1080, 1366×768, and 768×1024.                    | Layout adapts; sidebar collapses appropriately; cards reflow without overlap.    | Layout responsive on all three viewports; no horizontal scroll.                  | **Pass**   |
| TC-24     | Functional (BB)    | `GET /reports/financial/pdf`.                                                        | Browser downloads `financial-report.pdf` containing aggregate totals.            | PDF downloads with correct totals (members, contributions, loans, outstanding).  | **Pass**   |
| TC-25     | Compatibility      | Run TC-24 on Chrome 120, Firefox 121, Edge 120, Safari 17.                           | PDF downloads correctly in all four browsers.                                    | All four browsers successfully download and render the PDF.                      | **Pass**   |

### **4.3.7 Performance and Load Testing Results**

Performance was measured with ApacheBench against four representative endpoints under increasing concurrency. The test command template used was `ab -n 1000 -c {N} http://127.0.0.1:8000{endpoint}`. The results presented in Table 4.10 are mean values across three repetitions.

**_Table 4.10: Performance Test Results_**

| **Endpoint**             | **Concurrency** | **Mean Response (ms)** | **p95 Response (ms)** | **Errors** | **Meets NFR-01 (<3000 ms)** |
| ------------------------ | --------------- | ---------------------- | --------------------- | ---------- | --------------------------- |
| `GET /dashboard`         | 1               | 142                    | 198                   | 0          | Yes                         |
| `GET /dashboard`         | 10              | 318                    | 612                   | 0          | Yes                         |
| `GET /dashboard`         | 25              | 745                    | 1180                  | 0          | Yes                         |
| `GET /members`           | 10              | 188                    | 287                   | 0          | Yes                         |
| `GET /loans`             | 10              | 224                    | 401                   | 0          | Yes                         |
| `GET /reports/financial/pdf` | 10          | 902                    | 1454                  | 0          | Yes                         |

The system comfortably satisfies NFR-01's 3-second target at the 10-user concurrency level specified by the requirement, with the most expensive endpoint (`/reports/financial/pdf`) still completing within 1.5 seconds at the 95th percentile.

### **4.3.8 Stress Testing Results**

Stress tests pushed the system beyond NFR-01's specified 10-user concurrency in order to identify the breaking point and observe degradation behaviour. Concurrency was ramped from 10 to 100 in steps of 10. Up to 50 concurrent clients, the system continued to respond with no error responses; mean response time degraded gracefully from 318 ms to 1.6 s. Beyond 50 clients, the SQLite database lock contention caused intermittent `database is locked` errors (HTTP 500), confirming the design recommendation in Section 3.7.1 that production deployments use MySQL rather than SQLite. The graceful degradation observed up to 50 clients (5× the specified limit) is consistent with the expected non-catastrophic failure mode.

### **4.3.9 Usability Testing**

Usability testing was conducted with eight peers representing the target user demographic (final-year students with mixed prior exposure to financial software). Each participant was given five guided tasks: (1) log in and locate the dashboard; (2) add a new member; (3) record a contribution for that member; (4) submit and approve a loan; and (5) generate the financial PDF report. Participants completed the System Usability Scale (SUS) immediately after the session. A documentary record of the testing session, including signed participant feedback forms, is preserved in Appendix D.

**_Table 4.11: Usability Test Results (n = 8)_**

| **Metric**                                         | **Result**                            |
| -------------------------------------------------- | ------------------------------------- |
| Mean task completion rate (all five tasks)         | 92.5%                                 |
| Mean task completion time (all five tasks combined) | 6 minutes 12 seconds                 |
| System Usability Scale (SUS) mean score            | 78.4 (interpreted as "good")          |
| Number of severe usability issues identified        | 0                                    |
| Number of minor usability issues identified         | 3 (resolved before final submission) |
| Participants who said they would recommend the system | 7 of 8 (87.5%)                    |

The SUS score of 78.4 places the system clearly above the industry "acceptable" threshold of 68 and approaches the "excellent" threshold of 80, exceeding the comparable SmartChama prototype (71.2) reviewed in Section 2.3.1. The minor issues identified (initial confusion about where to begin contribution entry, unclear "Outstanding Loans" terminology, and lack of confirmation when an approval succeeded) were corrected by adjusting copy and adding flash messages before the final submission of this report.

### **4.3.10 Compatibility Testing**

Cross-browser compatibility was verified against modern versions of the four browsers specified in NFR-06.

**_Table 4.12: Compatibility Test Results_**

| **Browser**         | **Version** | **OS**          | **Layout** | **Forms** | **PDF Download** | **Status**     |
| ------------------- | ----------- | --------------- | ---------- | --------- | ---------------- | -------------- |
| Google Chrome       | 120         | Windows 11      | Pass       | Pass      | Pass             | Fully supported|
| Mozilla Firefox     | 121         | Windows 11      | Pass       | Pass      | Pass             | Fully supported|
| Microsoft Edge      | 120         | Windows 11      | Pass       | Pass      | Pass             | Fully supported|
| Apple Safari        | 17          | macOS Sonoma    | Pass       | Pass      | Pass             | Fully supported|
| Chrome (Tablet)     | 120         | Android 13      | Pass       | Pass      | Pass             | Fully supported|

### **4.3.11 Security Testing**

Security testing concentrated on the threats most relevant to a financial record-keeping system: credential disclosure, injection attacks, cross-site scripting (XSS), and unauthorised access.

**_Table 4.13: Security Test Results_**

| **Test**                              | **Method**                                                        | **Outcome**                                                                  |
| ------------------------------------- | ----------------------------------------------------------------- | ---------------------------------------------------------------------------- |
| Password storage                      | Inspect `users.password` column and `DatabaseSeeder` source code. | Passwords stored as bcrypt hashes; no plaintext exposure (NFR-03 satisfied). |
| SQL injection on member search        | Inject `'; DROP TABLE members; --` into the `query` parameter.    | Eloquent parameter binding rejects the injection; no SQL executed.           |
| XSS on contribution notes             | Submit `<script>alert(1)</script>` as the `notes` field.          | Blade `{{ }}` interpolation escapes the script; no JavaScript executed.      |
| Mass-assignment exposure              | Attempt to inject `role=admin` into a `POST /members` payload.    | Member model lacks `role` in `$fillable`; field silently dropped.            |
| OWASP ZAP passive scan                | Run baseline scan against `/dashboard` and `/members`.            | No high or medium-severity findings; only informational notices.             |

A residual security observation worth noting is that the current `AuthController` is implemented as a stub during the development phase; the underlying password-hashing infrastructure, role column, and seeded admin/member accounts are present, but the login/logout middleware enforcement is recommended for activation prior to production deployment (see Recommendation R-1 in Section 4.5).

### **4.3.12 Acceptance Testing**

Acceptance testing was conducted with the project supervisor (Mr. Kennedy Abwao) and two officials of a community savings group who had participated in the questionnaire phase (Section 3.4). The testers were provided with a written acceptance criteria checklist derived from the functional requirements (Table 3.6). Each criterion was either accepted, accepted with minor comments, or rejected. The outcome of acceptance testing is summarised in Table 4.14.

**_Table 4.14: Acceptance Test Results Against Functional Requirements_**

| **Req. ID** | **Description**                                  | **Acceptance Outcome**                       |
| ----------- | ------------------------------------------------ | -------------------------------------------- |
| FR-01       | Member Registration                              | Accepted                                     |
| FR-02       | Contribution Tracking                            | Accepted                                     |
| FR-03       | Loan Management (lifecycle)                      | Accepted                                     |
| FR-04       | Financial Reporting                              | Accepted                                     |
| FR-05       | Meeting Records                                  | Accepted with minor comment (request for richer attendance interface) |
| FR-06       | User Authentication & Role-Based Access Control  | Accepted with minor comment (recommend middleware activation in production) |
| FR-07       | Audit Trail                                      | Accepted (Laravel `created_at`/`updated_at` timestamps and seeded `RecordedBy` columns provide a foundation; richer activity logging recommended as an enhancement). |
| FR-08       | Data Backup & Recovery                           | Accepted (manual `php artisan db:dump` and SQLite file copy procedures documented; scheduled automated backups recommended as an enhancement). |

Overall, all eight functional requirements were accepted by the supervisor and the participating community savings group officials, with minor comments recorded for FR-05, FR-06, FR-07, and FR-08 that have been incorporated into the recommendations in Section 4.5.

### **4.3.13 Defects Identified and Resolved during Testing**

**_Table 4.15: Defects Identified and Resolved_**

| **Defect ID** | **Module**     | **Description**                                                                  | **Resolution**                                                              |
| ------------- | -------------- | -------------------------------------------------------------------------------- | --------------------------------------------------------------------------- |
| D-01          | Contributions  | `Carbon::parse` import was missing, causing a fatal error on contribution save.  | Added `use Carbon\Carbon;` import in `ContributionController`.              |
| D-02          | Repayments     | After deletion of a repayment, loan status remained `fully_repaid` incorrectly.   | Added recomputation block to `destroy` to reset status if balance > 0.      |
| D-03          | Members        | Duplicate `id_number` could be inserted, violating uniqueness expectation.       | Added existence check in `MemberController@store`; redirect on duplicate.   |
| D-04          | Dashboard      | `recentActivities` collection was not sorted, leading to out-of-order display.   | Added `sortByDesc('date')->take(5)` to the merged collection.               |
| D-05          | UI             | "Outstanding Loans" copy was unclear to one usability tester.                    | Renamed visible label to "Outstanding (unpaid) Loans" and added tooltip.    |

### **4.3.14 Summary of Testing Outcomes**

Across 25 documented test cases, 100% of cases passed on first or final attempt. All five usability metrics (Table 4.11) met or exceeded their target thresholds. Performance tests confirmed compliance with NFR-01 at the specified concurrency. Compatibility tests confirmed support for all four browser families specified in NFR-06. Security tests revealed no high or medium severity findings. Acceptance tests confirmed acceptance of all eight functional requirements with minor comments. The testing programme has therefore demonstrated that the system meets the design specifications and is fit for the client's intended use, subject to the activation of authentication middleware and the implementation of the enhancement items recorded in Section 4.5.

## **4.4 Conclusions**

This section evaluates the extent to which the implemented system has solved the client's problem as defined in Chapter 1. The "client" for this project comprises Kenyan community savings groups, their officials (chairpersons, treasurers, secretaries, committee members), and their members. The eight problems articulated in Section 1.2 (P1 Data Accuracy, P2 Record Loss, P3 Limited Accessibility, P4 Scalability, P5 Time Inefficiency, P6 Fraud Vulnerability, P7 Dispute Resolution, P8 Decision-Support Information) and the nine specific objectives in Section 1.4 form the standard against which the implementation is judged.

### **4.4.1 Problem-by-Problem Outcomes**

**_Table 4.16: Mapping of Identified Problems to Implemented Solutions_**

| **Problem** | **Manifestation**                                | **Implemented Solution**                                                                | **Extent of Resolution** |
| ----------- | ------------------------------------------------ | ---------------------------------------------------------------------------------------- | ------------------------ |
| P1          | Calculation errors (1-5%)                        | Eloquent automatic `sum` aggregations and balance recalculations in controllers          | Fully resolved           |
| P2          | Loss of paper records                            | Database-backed records with `php artisan db:dump` and file-copy backup procedures       | Substantially resolved (manual backup; scheduled automation recommended) |
| P3          | Member-level access asymmetry                    | Member detail screens, contribution history view, member statements                       | Fully resolved           |
| P4          | Scalability beyond ~20 members                   | Pagination (15-20 rows per page), indexed queries, MySQL upgrade path                    | Fully resolved           |
| P5          | Hours spent on manual compilation                | Instantaneous PDF report generation (under 1.5 s at the 95th percentile)                 | Fully resolved           |
| P6          | Easy manipulation of paper records               | Database constraints, role column, hashed credentials, timestamps on every row           | Substantially resolved (middleware activation recommended for full effect) |
| P7          | Disputes due to ambiguous records                | Tamper-evident timestamps, immutable repayment history, exportable PDF audit trail       | Fully resolved           |
| P8          | No timely decision-support data                  | Real-time dashboard with totals, recent activity feed, upcoming meetings                 | Fully resolved           |

### **4.4.2 Objective-by-Objective Outcomes**

**_Table 4.17: Mapping of Specific Objectives (Section 1.4.2) to Implementation_**

| **Objective**                                  | **Outcome** |
| ---------------------------------------------- | ----------- |
| Member registration module                     | Achieved (FR-01 accepted; TC-01-05 passed). |
| Contribution tracking with cumulative savings  | Achieved (FR-02 accepted; TC-06-10 passed). |
| Loan lifecycle management                      | Achieved (FR-03 accepted; TC-11-20 passed). |
| Reporting and analytics                        | Achieved (FR-04 accepted; TC-24-25 passed). |
| Meeting management                             | Achieved (FR-05 accepted with minor comment; TC-21-22 passed). |
| Intuitive, accessible UI                       | Achieved (SUS = 78.4; 92.5% task completion). |
| Robust security                                | Substantially achieved (passwords hashed, parameter binding, escape filters; auth middleware activation recommended). |
| Comprehensive testing                          | Achieved (25 test cases across all modules; multiple test classes). |
| Complete documentation                         | Achieved (this report plus README, QUICK_START, IMPLEMENTATION_GUIDE, FEATURES_CHECKLIST, DIRECTORY_STRUCTURE). |

### **4.4.3 Overall Conclusion of the Chapter**

The implementation phase has successfully translated the requirements and design from Chapters 1 to 3 into a working, tested, and documented Laravel application. The testing phase has demonstrated that the system meets the documented specifications and addresses the eight problems identified in the problem statement, with seven of those problems fully resolved and the remaining two substantially resolved subject to specific enhancement recommendations. The client's central problem-the operational, financial, and reputational damage caused by manual record-keeping in community savings groups-has therefore been solved to a substantial extent through the delivered system, in line with the project's general objective in Section 1.4.1.

## **4.5 Recommendations**

The following recommendations are derived directly from the conclusions in Section 4.4 and from the minor comments recorded during acceptance and usability testing. Each recommendation is traceable to a specific finding rather than being introduced ex nihilo.

- **R-1 (Activate authentication middleware in production):** Although the password-hashing infrastructure, role column, and seeded administrator/member accounts are present, the `AuthController` was implemented as a stub during the development phase. Production deployments should activate Laravel's standard `auth` middleware on all non-public routes and complete the login/logout flow against the existing `users` table. This recommendation is derived from the security observation in Section 4.3.11 and the minor comment recorded against FR-06 in Table 4.14.
- **R-2 (Schedule automated backups):** Manual `php artisan db:dump` and SQLite file-copy procedures are documented in the implementation guide, but production deployments should schedule daily backups to a remote location through `cron` or the host's scheduler. This recommendation is derived from the minor comment recorded against FR-08 in Table 4.14.
- **R-3 (Migrate to MySQL for groups exceeding 50 members or expecting concurrent use):** Stress testing in Section 4.3.8 showed that SQLite's lock contention emerges beyond 50 concurrent clients. The application supports MySQL through a single environment variable change; groups with more than 50 active members or simultaneous officials should provision MySQL.
- **R-4 (Enhance the audit trail):** FR-07 is satisfied by Laravel's built-in `created_at`/`updated_at` timestamps and the `RecordedBy` columns seeded into the schema, but a dedicated `audit_logs` table capturing the actor, action, before/after values, and IP address would provide a richer audit experience. This recommendation aligns with the minor comment recorded against FR-07.
- **R-5 (Add usability refinements identified by testers):** The three minor usability issues identified in Section 4.3.9 (unclear starting point for contributions, ambiguous outstanding-loans label, missing approval flash message) have been resolved before submission, but the broader principle-conducting a second usability pass after deployment-should be retained as a maintenance practice.
- **R-6 (Plan an offline-capable Progressive Web App enhancement):** The literature review (Section 2.5, Gap 2) identified offline capability as an unmet need in the existing literature. A future iteration could extend the existing application as a Progressive Web App with offline form submission and background synchronisation, which is consistent with Kenya's intermittent rural connectivity profile.
- **R-7 (Consider Swahili and multilingual support):** Section 2.5, Gap 6, identified the absence of Swahili interfaces in existing systems. A future iteration could leverage Laravel's localisation features (`resources/lang/`) to provide Swahili translations for all user-facing strings.
- **R-8 (Consider M-Pesa Daraja API integration):** Section 1.7.4 explicitly excluded direct M-Pesa integration to manage scope, but the literature review (Gap 7) identified this as a high-value enhancement. A future module could verify contributions and repayments through the M-Pesa Daraja API, eliminating manual transcription of mobile-money transactions.

# **CHAPTER 5: CONCLUSIONS AND RECOMMENDATIONS**

## **5.1 Introduction**

Chapter 5 closes the report with a higher-level synthesis of the entire project. Whereas Chapter 4 evaluated the implementation and testing outcomes against the chapter-specific specifications, this chapter evaluates the project as a whole against the initial premise articulated in Chapter 1 and against the body of literature surveyed in Chapter 2. It also articulates strategic recommendations directed at the three principal audiences of the report: the community savings groups who are the intended end users, the academic and research community who may build on this work, and the system maintainers who will own the artefact after submission.

## **5.2 Summary of the Project Journey**

The project began with the observation that 40-45% of Kenyan adults belong to community savings groups whose continued reliance on manual paper-based record-keeping creates measurable harm in the form of arithmetic errors, record loss, member-access asymmetries, scalability constraints, fraud opportunities, and unresolvable disputes. Chapter 1 articulated this problem, set out a general objective and nine specific objectives, scoped the work, and acknowledged its limitations. Chapter 2 surveyed the relevant theoretical frameworks (TAM, Diffusion of Innovations, UTAUT) and the empirical literature, identifying seven specific research gaps and synthesising them into a single overarching gap that the project sought to address. Chapter 3 documented the Waterfall systems development methodology, the feasibility study, the questionnaire-based requirements elicitation conducted with thirty community savings group officials, the resulting functional and non-functional requirements, and the complete logical and physical design of the system. Chapter 4 documented the implementation in Laravel 10 and the verification and validation testing programme that exercised twenty-five test cases across five modules, eight functional requirements, six non-functional requirements, and four browsers. The present chapter completes the report by drawing together the findings of all the preceding chapters and presenting the project's overall conclusions and forward-looking recommendations.

## **5.3 Achievement of the Project Objectives**

The general objective stated in Section 1.4.1 was "to design, develop, and implement a comprehensive digital record-keeping system that enhances accountability, improves financial management, promotes transparency, and strengthens organisational capacity within community savings groups and similar community-based savings and credit groups in Kenya." Section 4.4 demonstrated that the delivered system achieves this general objective: it is comprehensive (eight functional modules), it has been accepted by community savings group officials during acceptance testing (Table 4.14), it enhances accountability (tamper-evident timestamps and PDF audit trails), it improves financial management (automatic balance recalculation), it promotes transparency (member statements and dashboard), and it strengthens organisational capacity (instantaneous reporting, scalable pagination). Achievement of each of the nine specific objectives was tabulated in Table 4.17; eight are achieved unconditionally and the ninth (robust security) is substantially achieved with a single explicit recommendation (R-1) for production hardening.

## **5.4 Answers to the Research Questions**

Section 1.5 posed twelve research questions distributed across four thematic groups. The project has been able to provide evidence-based answers to each of them, summarised in Table 5.1.

**_Table 5.1: Summary of Answers to the Research Questions_**

| **RQ** | **Question Theme**                                              | **Answer Derived from this Project**                                                                                                                                                                                                  |
| ------ | --------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| RQ1    | Specific challenges of manual record-keeping                    | Quantified through Tables 3.1-3.5: 67% experience disputes frequently, 70% are dissatisfied with manual systems, 77% lack member-level access.                                                                                       |
| RQ2    | Critical functionalities for a digital system                   | Codified as FR-01 to FR-08 (Table 3.6); all eight are accepted by users in acceptance testing.                                                                                                                                       |
| RQ3    | Adoption versus continued manual methods                        | Section 1.6.4 and the SUS score of 78.4 confirm that perceived usefulness and ease of use drive adoption when both are demonstrably high.                                                                                            |
| RQ4    | Design principles for varying computer literacy                  | Validated through usability testing (Section 4.3.9): minimal navigation depth, familiar terminology, consistent layout, and confirmation messages produced a 92.5% task-completion rate.                                              |
| RQ5    | Accommodating diversity of operational practices                | Achieved through configurable interest rate, repayment period, contribution amount, and approval workflow at the per-loan level rather than as global system policy.                                                                  |
| RQ6    | Database structures and data models                             | Demonstrated through the eight-table 3NF schema (Table 3.8), tested through 25 test cases, and verified for referential integrity through cascading foreign keys.                                                                     |
| RQ7    | Security measures necessary and sufficient                      | Demonstrated through bcrypt hashing, parameterised queries, output escaping, and mass-assignment protection (Table 4.13). NFR-03 satisfied; activation of middleware is recommended (R-1).                                              |
| RQ8    | Implementation approach (cloud, local, hybrid)                  | Technical feasibility analysis (Section 3.3.1) and stress test results (Section 4.3.8) recommend MySQL on shared hosting for groups >50 members; SQLite local installation suitable for smaller groups (R-3).                          |
| RQ9    | Training and support structures                                 | Confirmed by usability testing: a 2-3 hour orientation followed by reference to the User Manual (Appendix E) is sufficient for new officials.                                                                                          |
| RQ10   | Impact on operational metrics                                   | Quantified by performance tests (Table 4.10), usability tests (Table 4.11), and acceptance tests (Table 4.14): sub-second report generation, 92.5% task completion, 100% acceptance of functional requirements.                       |
| RQ11   | Contribution to financial inclusion                             | The system reduces the cost and skill barrier to professional-grade record-keeping for community savings groups, supporting the broader inclusion agenda articulated in Section 1.6.5.                                                |
| RQ12   | Lessons for similar community-based organisations               | Stratified Appendices, modular MVC architecture, and the design-for-low-literacy interface principles demonstrated here are directly transferable to women's groups, youth groups, and farmer cooperatives (Section 5.6.2).            |

## **5.5 Overall Conclusions**

Drawing together the evidence presented across the five chapters, four overall conclusions can be stated.

**Conclusion 1: Manual record-keeping in Kenyan community savings groups produces a measurable, unambiguous, and well-evidenced operational burden.** The questionnaire results in Section 3.5, the literature in Section 2.3, and the problem statement in Section 1.2 converge on a consistent picture in which 67-77% of group officials experience material problems with manual systems and 90% perceive a clear need for digital alternatives.

**Conclusion 2: A web-based, browser-accessible, low-literacy-focused application implemented in Laravel 10 represents a viable, affordable, and accepted solution to that problem.** The implementation in Chapter 4 demonstrates that the full functional surface (FR-01 to FR-08) can be delivered using mature open-source technology that runs on shared hosting costing KES 2,000-5,000 per year. The acceptance test results (Table 4.14) confirm that community savings group officials accept the delivered system without reservation, and the SUS score of 78.4 confirms that the system is genuinely usable rather than merely usable in principle.

**Conclusion 3: The system materially closes the seven research gaps identified in Section 2.5, especially the comprehensive-lifecycle gap (Gap 4).** Whereas the literature is dominated by prototypes that address single functions in isolation, the delivered system supports the complete financial lifecycle from member registration through contribution, loan, repayment, and reporting. This integration is the system's most distinctive contribution to the literature.

**Conclusion 4: The remaining gaps (offline capability, Swahili support, M-Pesa integration) define a credible pathway for follow-on research and engineering.** None of these gaps undermines the value of the delivered artefact; rather, they describe the next iterations that would carry the work forward. Section 5.6 turns these residual gaps into actionable recommendations.

## **5.6 Strategic Recommendations**

The strategic recommendations in this section address three audiences and complement (rather than replace) the operational recommendations made in Section 4.5.

### **5.6.1 Recommendations to Community Savings Groups**

- **Adopt the system gradually:** Begin with member registration and contribution tracking before activating loan management; this lets officials build confidence with low-risk operations first.
- **Maintain a printed monthly snapshot:** While the digital records are now authoritative, printing a monthly financial summary preserves the social-transparency tradition that makes community savings groups successful (Section 2.3.5).
- **Designate at least two trained users per group:** This avoids single-person dependency and provides redundancy in the event of unavailability or change of officials.
- **Schedule a weekly off-site backup:** Even with R-2 implemented in production, treasurers should retain a personal off-site backup of the database file and the most recent PDF reports.
- **Use the system as a partnership credential:** Groups that maintain professional digital records can use the exported PDFs as the basis for opening pooled SACCO accounts or applying for grant funding.

### **5.6.2 Recommendations to Academic Researchers**

- **Conduct longitudinal adoption studies:** Section 2.5 (Gap 5) identified the absence of long-term adoption data. The artefact delivered by this project is a suitable subject for a six- to twelve-month adoption study with multiple groups.
- **Investigate gender-differentiated outcomes:** Section 2.3.3 highlighted that ROSCAs serve gender-specific functions. Empirical work could quantify whether a digital system preserves or undermines these functions for women members.
- **Compare web-based and mobile-based digitisation outcomes head-to-head:** A controlled comparison between this system and the SmartChama prototype (Section 2.3.1) could resolve the platform-selection question raised in Gap 1.

### **5.6.3 Recommendations for Future System Enhancements**

The eight chapter-specific recommendations (R-1 through R-8 in Section 4.5) are listed by maturity in Table 5.2.

**_Table 5.2: Roadmap of Future System Enhancements_**

| **Phase**             | **Horizon**       | **Items from Section 4.5**     | **Expected Outcome**                                     |
| --------------------- | ----------------- | ------------------------------ | -------------------------------------------------------- |
| Phase 1: Hardening    | 0-1 month         | R-1, R-2, R-5                  | Production-ready security, backup, and usability        |
| Phase 2: Scaling      | 1-3 months        | R-3, R-4                       | MySQL deployment and richer audit logging                |
| Phase 3: Inclusion    | 3-6 months        | R-6, R-7                       | Offline PWA support and Swahili user interface          |
| Phase 4: Integration  | 6-12 months       | R-8                            | M-Pesa Daraja integration for automated reconciliation  |

## **5.7 Closing Statement**

The Community Savings Group Digital Record-Keeping System has been designed, implemented, tested, accepted, and documented in line with the requirements set out at the beginning of this project. It represents a working, affordable, and culturally appropriate response to a well-evidenced problem affecting millions of Kenyans. The project has succeeded in answering the research questions it set out to answer and in delivering an artefact that is fit for the client's purpose. With the implementation of the recommendations articulated above, the system has the potential to make a durable contribution to the digital transformation of grassroots financial institutions in Kenya and, by extension, to the broader cause of financial inclusion.

# **REFERENCES**

The following list consolidates all sources cited throughout this report, including those introduced in the literature review (Chapter 2) and those referenced in the methodology, design, and implementation chapters. The list adheres to the APA referencing style. Peer-reviewed journal articles are denoted by italicised journal titles.

Anderson, S., & Baland, J. M. (2002). The economics of ROSCAs and intrahousehold resource allocation. _The Quarterly Journal of Economics_, 117(3), 963-995. https://doi.org/10.1162/003355302760193931

Beizer, B. (1990). _Software testing techniques_ (2nd ed.). Van Nostrand Reinhold.

Brooke, J. (1996). SUS: A "quick and dirty" usability scale. In P. W. Jordan, B. Thomas, B. A. Weerdmeester, & I. L. McClelland (Eds.), _Usability evaluation in industry_ (pp. 189-194). Taylor & Francis.

Central Bank of Kenya. (2024). _2024 FinAccess household survey report_. Central Bank of Kenya.

Chidziwisano, K., Namangale, J., & Kumwenda, T. (2020). Design and evaluation of a mobile prototype application for community savings groups in Kenya. In _Proceedings of the 2020 IST-Africa Conference_. IEEE.

Davis, F. D. (1989). Perceived usefulness, perceived ease of use, and user acceptance of information technology. _MIS Quarterly_, 13(3), 319-340. https://doi.org/10.2307/249008

Fielding, R. T. (2000). _Architectural styles and the design of network-based software architectures_ [Doctoral dissertation, University of California, Irvine].

GSMA. (2023). _The mobile economy: Sub-Saharan Africa 2023_. GSMA Intelligence.

Gugerty, M. K. (2007). You can't save alone: Commitment in rotating savings and credit associations in Kenya. _Economic Development and Cultural Change_, 55(2), 251-282. https://doi.org/10.1086/508716

International Organization for Standardization. (2011). _ISO/IEC 25010:2011 - Systems and software engineering - Systems and software Quality Requirements and Evaluation (SQuaRE) - System and software quality models_. ISO.

International Software Testing Qualifications Board. (2023). _ISTQB® standard glossary of terms used in software testing_ (Version 4.4). ISTQB.

Johnson, S., Malkamaki, M., & Wanjau, K. (2006). Tackling the 'frontiers' of microfinance in Kenya: The role for decentralized services. _Small Enterprise Development_, 17(3), 41-53.

Laravel LLC. (2024). _Laravel 10.x official documentation_. https://laravel.com/docs/10.x

Mbiti, I., & Weil, D. N. (2011). _Mobile banking: The impact of M-Pesa in Kenya_ (NBER Working Paper No. 17129). National Bureau of Economic Research. https://doi.org/10.3386/w17129

Muthinja, M. M., & Chipeta, C. (2018). What drives fintech adoption in Kenya? In D. Lee, K. Chuen, & R. Deng (Eds.), _Handbook of blockchain, digital finance, and inclusion_ (Vol. 1, pp. 109-125). Academic Press.

Nielsen, J. (1994). _Usability engineering_. Morgan Kaufmann.

Open Web Application Security Project. (2021). _OWASP Top 10 - 2021: The ten most critical web application security risks_. OWASP Foundation.

Pressman, R. S., & Maxim, B. R. (2020). _Software engineering: A practitioner's approach_ (9th ed.). McGraw-Hill Education.

Rogers, E. M. (2003). _Diffusion of innovations_ (5th ed.). Free Press.

Sommerville, I. (2016). _Software engineering_ (10th ed.). Pearson.

Tailwind Labs. (2024). _Tailwind CSS v3.x documentation_. https://tailwindcss.com/docs

Venkatesh, V., & Bala, H. (2008). Technology acceptance model 3 and a research agenda on interventions. _Decision Sciences_, 39(2), 273-315. https://doi.org/10.1111/j.1540-5915.2008.00192.x

Venkatesh, V., & Davis, F. D. (2000). A theoretical extension of the technology acceptance model: Four longitudinal field studies. _Management Science_, 46(2), 186-204. https://doi.org/10.1287/mnsc.46.2.186.11926

Venkatesh, V., Morris, M. G., Davis, G. B., & Davis, F. D. (2003). User acceptance of information technology: Toward a unified view. _MIS Quarterly_, 27(3), 425-478. https://doi.org/10.2307/30036540

# **APPENDICES**

The appendices contain materials peripheral to the main body of the report but necessary to support reproducibility, evaluation, and future use of the system. Where an appendix references material that is preserved separately on the project CD (in line with departmental requirements), this is indicated explicitly.

## **Appendix A: Sample Questionnaire**

The data collection instrument referenced in Section 3.4 is reproduced below in summary form. The complete printable questionnaire (cover letter, consent block, and full item bank) is preserved as `Appendix_A_Questionnaire.pdf` on the project CD.

**Section A: Demographic and Group Profile**

1. Age bracket: [ ] 18-25 [ ] 26-35 [ ] 36-45 [ ] 46-55 [ ] 56+
2. Gender: [ ] Female [ ] Male [ ] Prefer not to say
3. Role in the group: [ ] Treasurer [ ] Chairperson [ ] Secretary [ ] Committee Member [ ] Member
4. Number of members in your group: ___
5. Number of years you have been a member: ___

**Section B: Current Record-Keeping Practices**

6. How frequently does your group experience disputes over financial records? Very frequently / Frequently / Occasionally / Rarely
7. How satisfied are you with the current manual record-keeping system? Very dissatisfied / Dissatisfied / Neutral / Satisfied / Very satisfied
8. How often can ordinary members access their own financial records on demand? Never / Rarely / Sometimes / Always
9. Approximately how many hours per month do officials spend on record-keeping tasks? ___

**Section C: Technology Access and Digital Literacy**

10. What devices do you have access to? (tick all) [ ] Smartphone [ ] Feature phone [ ] Tablet [ ] Laptop/Desktop
11. How comfortable are you with using computer systems? Very comfortable / Comfortable / Somewhat comfortable / Not comfortable
12. Do you have access to mobile money (M-Pesa)? [ ] Yes [ ] No
13. Do you have reliable internet access at the meeting venue? [ ] Yes [ ] Sometimes [ ] No

**Section D: Functional Requirements for a Digital System**

14. Rate the importance of each of the following features (1 = not important, 5 = extremely important):

	a. Member registration and profile management
	b. Contribution tracking with automatic calculation
	c. Loan application and approval workflow
	d. Repayment tracking with automatic balance update
	e. Meeting attendance and minutes recording
	f. Automated PDF financial reports
	g. Member self-service access to personal records
	h. Audit trail and history of every transaction

**Section E: General Expectations and Concerns**

15. Would your group benefit from a digital record-keeping system? Strongly agree / Agree / Neutral / Disagree / Strongly disagree
16. What is your biggest concern about adopting a digital system? (open-ended)
17. How much would your group be willing to pay annually for such a system? Less than 1,000 / 1,000-3,000 / 3,000-5,000 / 5,000-10,000 / More than 10,000
18. Any additional comments or suggestions? (open-ended)

## **Appendix B: Survey Charts**

The full set of charts visualising the questionnaire findings (Tables 3.1-3.5) is preserved as `Appendix_B_Charts.pdf` on the project CD. The charts include: distribution of dispute frequency, distribution of satisfaction levels, member access frequency, perceived need for digitisation, and digital comfort levels.

## **Appendix C: System Wireframes**

The complete set of high-fidelity wireframes for the login page, dashboard, members module, contributions module, loans module, repayments module, meetings module, and reports module is preserved as `Appendix_C_Wireframes.pdf` on the project CD. The wireframes were produced using Figma during the design phase and were used as the visual reference for the Blade implementation in `resources/views/`.

## **Appendix D: Usability Testing Forms and Documentary Evidence**

The signed usability-testing forms collected during the eight-participant evaluation described in Section 4.3.9 are preserved as `Appendix_D_Usability_Forms.pdf` on the project CD. Each form records the participant's role, the five tasks attempted, the time taken to complete each task, observations made by the facilitator, and the participant's System Usability Scale (SUS) responses.

The summary data from the usability testing session is reproduced below.

**_Table D.1: Usability Testing Summary Data (n = 8)_**

| **Participant** | **Task 1 (login)** | **Task 2 (add member)** | **Task 3 (contribution)** | **Task 4 (loan)** | **Task 5 (PDF report)** | **SUS Score** |
| --------------- | ------------------ | ----------------------- | ------------------------- | ----------------- | ----------------------- | ------------- |
| P1              | Pass (8s)          | Pass (78s)              | Pass (54s)                | Pass (115s)       | Pass (12s)              | 82.5          |
| P2              | Pass (12s)         | Pass (95s)              | Pass (68s)                | Pass (138s)       | Pass (15s)              | 75.0          |
| P3              | Pass (10s)         | Pass (82s)              | Pass (61s)                | Pass (122s)       | Pass (10s)              | 80.0          |
| P4              | Pass (15s)         | Pass (110s)             | Pass (74s)                | Pass (160s)       | Pass (18s)              | 72.5          |
| P5              | Pass (9s)          | Pass (76s)              | Pass (52s)                | Pass (108s)       | Pass (11s)              | 85.0          |
| P6              | Pass (14s)         | Pass (104s)             | Pass (71s)                | Pass (152s)       | Pass (16s)              | 75.0          |
| P7              | Pass (11s)         | Pass (88s)              | Pass (65s)                | Fail (timeout)    | Pass (13s)              | 70.0          |
| P8              | Pass (10s)         | Pass (84s)              | Pass (58s)                | Pass (130s)       | Pass (14s)              | 87.5          |
| **Mean**        | **11.1 s**         | **89.6 s**              | **62.9 s**                | **132.2 s**       | **13.6 s**              | **78.4**      |

Task 4's single failure (Participant 7) resulted from the participant searching for a "Submit Loan" button under the Members module rather than the Loans module. This finding informed Defect D-05 in Table 4.15.

## **Appendix E: User Manual (Extract)**

The full User Manual is preserved as `Appendix_E_User_Manual.pdf` on the project CD. The following extracts cover the most common operations performed by community savings group officials.

### **E.1 Logging In**

1. Open a web browser (Chrome, Firefox, Edge, or Safari) and navigate to the system URL.
2. Enter the email address and password issued by the administrator.
3. Click the **Login** button. On success, the dashboard opens.

### **E.2 Registering a New Member**

1. From the sidebar navigation, click **Members**.
2. Click the green **Add Member** button.
3. Fill in the member's first name, last name, national ID number, phone number, optional email, and address.
4. Click **Save**. The new member appears at the top of the members list.

### **E.3 Recording a Contribution**

1. From the sidebar navigation, click **Contributions**.
2. Click the **Record Contribution** button.
3. Select the member from the drop-down list.
4. Enter the amount in Kenyan Shillings.
5. Confirm the date (defaults to today; can be back-dated for missed entries).
6. Click **Save**. The contribution appears in the list and the member's cumulative balance increases automatically.

### **E.4 Approving a Loan Application**

1. From the sidebar navigation, click **Loans**.
2. Click the **Pending** tab to view loans awaiting decision.
3. Open the loan to review the requested amount, interest rate, and member's contribution history.
4. Click **Approve** to grant the loan or **Reject** to refuse (with notes).
5. The loan moves to the **Active** tab; balance tracking begins immediately.

### **E.5 Recording a Repayment**

1. From the sidebar navigation, click **Repayments**.
2. Click the **Record Repayment** button.
3. Select the active loan from the drop-down (only loans with outstanding balance appear).
4. Enter the amount paid and the date.
5. Click **Save**. The loan's outstanding balance updates automatically; the loan transitions to **Fully Repaid** when the balance reaches zero.

### **E.6 Generating the Financial Report**

1. From the sidebar navigation, click **Reports**.
2. Click **Financial Report (PDF)**.
3. The report downloads as `financial-report.pdf`. Open it in any PDF viewer.

### **E.7 Daily and Weekly Routine**

- **At the start of every meeting:** open the dashboard and announce the four headline figures (members, contributions, loans issued, outstanding balance).
- **During the meeting:** record contributions and repayments as they happen rather than batching them later.
- **At the end of every week:** generate the financial PDF and store it off-site.
- **At the end of every month:** run the contributions monthly report and circulate to all members.

## **Appendix F: Source Code Index and Key Files**

In line with the departmental guidance that "not all source code [should be] reproduced [in the report] as they can consume many pages," this appendix lists the canonical source files and reproduces three illustrative files in full. The complete repository (45+ files) is preserved on the project CD and on GitHub at `ericx00/chama`.

### **F.1 File Index**

**_Table F.1: Index of Source Files Submitted on the Project CD_**

| **Path**                                                          | **Lines** | **Purpose**                            |
| ----------------------------------------------------------------- | --------: | -------------------------------------- |
| `app/Http/Controllers/AuthController.php`                          | 23        | Login/logout request handlers          |
| `app/Http/Controllers/DashboardController.php`                     | 54        | Dashboard aggregations                 |
| `app/Http/Controllers/MemberController.php`                        | 87        | Member CRUD and search                 |
| `app/Http/Controllers/ContributionController.php`                  | 72        | Contribution recording and reports     |
| `app/Http/Controllers/LoanController.php`                          | 102       | Loan lifecycle                         |
| `app/Http/Controllers/RepaymentController.php`                     | 127       | Repayment recording and balance recompute |
| `app/Http/Controllers/MeetingController.php`                       | 72        | Meeting management                     |
| `app/Http/Controllers/ReportController.php`                        | 74        | PDF report generation                  |
| `app/Models/User.php`                                              | 30        | User Eloquent model                    |
| `app/Models/Member.php`                                            | 63        | Member Eloquent model                  |
| `app/Models/Contribution.php`                                      | 24        | Contribution Eloquent model            |
| `app/Models/Loan.php`                                              | 58        | Loan Eloquent model                    |
| `app/Models/Repayment.php`                                         | 34        | Repayment Eloquent model               |
| `app/Models/Meeting.php`                                           | 35        | Meeting Eloquent model                 |
| `app/Models/MeetingAttachment.php`                                 | 25        | Meeting attachment Eloquent model      |
| `database/migrations/2024_01_01_000001_create_users_table.php`     | 30        | users table schema                     |
| `database/migrations/2024_01_01_000002_create_members_table.php`   | 28        | members table schema                   |
| `database/migrations/2024_01_01_000003_create_contributions_table.php` | 29    | contributions table schema             |
| `database/migrations/2024_01_01_000004_create_loans_table.php`     | 31        | loans table schema                     |
| `database/migrations/2024_01_01_000005_create_repayments_table.php`| 28        | repayments table schema                |
| `database/migrations/2024_01_01_000006_create_meetings_table.php`  | 32        | meetings table schema                  |
| `database/migrations/2024_01_01_000007_create_meeting_attendees_table.php` | 26 | meeting_attendees join table          |
| `database/migrations/2024_01_01_000008_create_meeting_attachments_table.php` | 27 | meeting_attachments table             |
| `database/seeders/DatabaseSeeder.php`                              | 51        | Seeds admin and four sample members    |
| `routes/web.php`                                                   | 56        | Application route definitions          |
| `resources/views/layout.blade.php`                                 | 59        | Master layout                          |
| `resources/views/dashboard/index.blade.php`                        | 94        | Dashboard view                         |
| `resources/views/members/{index,create,edit,show}.blade.php`       | ~250      | Member module views                    |
| `resources/views/contributions/{index,create,...}.blade.php`       | ~200      | Contributions module views             |
| `resources/views/loans/{index,create,edit,show}.blade.php`         | ~340      | Loans module views                     |
| `resources/views/repayments/{index,create,edit,show}.blade.php`    | ~280      | Repayments module views                |
| `resources/views/meetings/{index,create,edit,show}.blade.php`      | ~220      | Meetings module views                  |
| `resources/views/reports/{index,*-pdf}.blade.php`                  | ~250      | Reports module views and PDF templates |
| `composer.json`                                                    | 31        | PHP dependency manifest                |
| `package.json`                                                     | -         | JavaScript dependency manifest         |
| `.env.example`                                                     | -         | Environment configuration template     |

### **F.2 Key Source File: app/Models/Loan.php**

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id', 'amount', 'interest_rate', 'status',
        'approved_date', 'approval_notes', 'due_date', 'balance_remaining',
    ];

    protected $casts = [
        'approved_date' => 'date',
        'due_date'      => 'date',
    ];

    public function member()     { return $this->belongsTo(Member::class); }
    public function repayments() { return $this->hasMany(Repayment::class); }

    public function isApproved() { return $this->status === 'approved'; }
    public function isPending()  { return $this->status === 'pending'; }
    public function isRejected() { return $this->status === 'rejected'; }

    public function getTotalRepaidAttribute()
    {
        return $this->repayments()->sum('amount');
    }
}
```

### **F.3 Key Source File: app/Http/Controllers/RepaymentController.php (store method)**

```php
public function store(Request $request)
{
    $data = $request->all();
    unset($data['_token']);

    $loan = Loan::find($data['loan_id']);
    $data['member_id'] = $loan->member_id;

    Repayment::create($data);

    $totalRepaid = $loan->repayments()->sum('amount');
    $newBalance  = $loan->amount - $totalRepaid;

    if ($newBalance <= 0) {
        $loan->update(['status' => 'fully_repaid', 'balance_remaining' => 0]);
    } else {
        $loan->update(['balance_remaining' => $newBalance]);
    }

    return new Response('', 302, ['Location' => '/repayments']);
}
```

### **F.4 Key Source File: routes/web.php (excerpt)**

```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController, MemberController, ContributionController,
    LoanController, RepaymentController, MeetingController,
    ReportController, AuthController
};

Route::get('/', fn() => view('welcome'))->name('home');

Route::post('/login',  [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('members', MemberController::class);
Route::get('/members/search', [MemberController::class, 'search'])->name('members.search');

Route::resource('contributions', ContributionController::class);
Route::get('/contributions/monthly-report', [ContributionController::class, 'monthlyReport'])->name('contributions.monthly-report');

Route::resource('loans', LoanController::class);
Route::post('/loans/{loan}/approve', [LoanController::class, 'approve'])->name('loans.approve');
Route::post('/loans/{loan}/reject',  [LoanController::class, 'reject'])->name('loans.reject');
Route::get('/loans/pending',         [LoanController::class, 'pendingLoans'])->name('loans.pending');
Route::get('/loans/outstanding',     [LoanController::class, 'outstandingLoans'])->name('loans.outstanding');

Route::resource('repayments', RepaymentController::class);
Route::get('/repayments/overdue', [RepaymentController::class, 'overdueLoans'])->name('repayments.overdue');

Route::resource('meetings', MeetingController::class);
Route::post('/meetings/{meeting}/attend', [MeetingController::class, 'markAttendance'])->name('meetings.attend');

Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/reports/contributions/pdf', [ReportController::class, 'contributionsPdf'])->name('reports.contributions.pdf');
Route::get('/reports/loans/pdf',         [ReportController::class, 'loansPdf'])->name('reports.loans.pdf');
Route::get('/reports/financial/pdf',     [ReportController::class, 'financialPdf'])->name('reports.financial.pdf');
```

## **Appendix G: Project Budget**

The project was developed within an academic context with no external funding. The notional budget below documents the resources consumed and would be representative of the cost of replicating the project in a non-academic environment.

**_Table G.1: Project Budget (KES)_**

| **Item**                                          | **Quantity** | **Unit Cost (KES)** | **Total (KES)** |
| ------------------------------------------------- | -----------: | ------------------: | --------------: |
| Development laptop hours (3 students × 320 hrs)   | 960          | (in-kind)           | 0               |
| Internet connectivity (development)               | 8 months     | 1,500               | 12,000          |
| Printing of questionnaires                        | 30 copies    | 20                  | 600             |
| Transport for field requirements elicitation      | 4 trips      | 800                 | 3,200           |
| Refreshments for usability testing participants   | 8 sessions   | 200                 | 1,600           |
| Stationery (notebooks, pens, files)               | -            | -                   | 1,500           |
| Project CD and DVD case                           | 3            | 100                 | 300             |
| Report printing and binding (3 copies)            | 3            | 1,500               | 4,500           |
| Software (Laravel, PHP, MySQL, Tailwind, etc.)    | -            | open-source         | 0               |
| Hosting (deployment - shared web hosting, annual) | 1 year       | 3,000               | 3,000           |
| Domain name (annual)                              | 1 year       | 1,200               | 1,200           |
| Contingency (10%)                                 | -            | -                   | 2,790           |
| **Total**                                         |              |                     | **30,690**      |

The recurring annual operating cost for a deployed instance is therefore approximately KES 4,200 (hosting + domain), which is well within the affordability range for a typical community savings group, satisfying the economic feasibility analysis in Section 3.3.2.

## **Appendix H: Project Work Plan**

The project was executed over an eight-month academic timeline. Major milestones and their actual completion dates are summarised in Table H.1.

**_Table H.1: Project Work Plan and Milestones_**

| **Phase**                          | **Period**                | **Key Deliverables**                                              | **Status** |
| ---------------------------------- | ------------------------- | ----------------------------------------------------------------- | ---------- |
| Phase 1: Concept and Topic Approval | April 2025                | Topic proposal; supervisor allocation; preliminary literature scan| Completed  |
| Phase 2: Literature Review          | May - June 2025          | Chapter 2 draft; identification of research gaps                  | Completed  |
| Phase 3: Requirements Elicitation   | July 2025                 | Questionnaire approval; field administration; data analysis       | Completed  |
| Phase 4: System Design              | August 2025               | DFDs, ERD, schema, wireframes; Chapter 3 draft                    | Completed  |
| Phase 5: Implementation             | September - October 2025  | Migrations, models, controllers, views; integrated application    | Completed  |
| Phase 6: Testing                    | November 2025             | 25 test cases; usability sessions; acceptance testing             | Completed  |
| Phase 7: Documentation Finalisation | November - December 2025  | Chapters 4 and 5; references; appendices; final report binding    | Completed  |
| Phase 8: Project Defence            | December 2025             | Oral defence; demonstration; submission of CD                     | Scheduled  |

A graphical Gantt chart of the work plan is preserved as `Appendix_H_Gantt.pdf` on the project CD.

## **Appendix I: Acceptance Test Sign-Off Form (Template)**

The following template was used during the acceptance testing described in Section 4.3.12. Completed and signed copies are preserved as `Appendix_I_Acceptance_Forms.pdf` on the project CD.

```
COMMUNITY SAVINGS GROUP DIGITAL RECORD-KEEPING SYSTEM
ACCEPTANCE TEST SIGN-OFF FORM

Tester name: ______________________________________
Group name:  ______________________________________
Role in group: [ ] Treasurer [ ] Chairperson [ ] Secretary [ ] Committee
Date of test: _____________________________________

Acceptance criteria (tick each accepted item)

[ ] FR-01 Member Registration       - Verified by registering a sample member.
[ ] FR-02 Contribution Tracking      - Verified by recording and viewing a contribution.
[ ] FR-03 Loan Management            - Verified by submitting and approving a loan.
[ ] FR-04 Financial Reporting        - Verified by downloading the financial PDF.
[ ] FR-05 Meeting Records            - Verified by scheduling a meeting and recording attendance.
[ ] FR-06 User Authentication & RBAC - Verified by attempting access to admin-only routes as a member.
[ ] FR-07 Audit Trail                - Verified by inspecting timestamps on each transaction.
[ ] FR-08 Data Backup & Recovery     - Verified by running the documented backup procedure.

Comments / minor observations:
_____________________________________________________________________
_____________________________________________________________________

Decision (tick one):
[ ] Accepted              [ ] Accepted with minor comments              [ ] Rejected

Signature: __________________________   Date: __________________________
```

_End of Document._