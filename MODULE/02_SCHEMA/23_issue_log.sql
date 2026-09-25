CREATE TABLE ISSUE_LOG (
    issue_log_id INT AUTO_INCREMENT PRIMARY KEY,

    complaint_id INT,
    maintenance_request_id INT,

    logged_by_technician_id INT,

    issue_type VARCHAR(50) NOT NULL,
    issue_description VARCHAR(255) NOT NULL,

    logged_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    resolution_description VARCHAR(255),
    issue_status VARCHAR(20) DEFAULT 'OPEN',

    CONSTRAINT fk_issue_complaint
        FOREIGN KEY (complaint_id)
        REFERENCES COMPLAINT(complaint_id)
        ON DELETE CASCADE,

    CONSTRAINT fk_issue_maintenance
        FOREIGN KEY (maintenance_request_id)
        REFERENCES MAINTENANCE_REQUEST(request_id)
        ON DELETE CASCADE,

    CONSTRAINT fk_issue_technician
        FOREIGN KEY (logged_by_technician_id)
        REFERENCES TECHNICIAN(technician_id),

    CONSTRAINT chk_issue_source
        CHECK (
            complaint_id IS NOT NULL
            OR maintenance_request_id IS NOT NULL
        ),

    CONSTRAINT chk_issue_status
        CHECK (
            issue_status IN
            ('OPEN', 'IN_PROGRESS', 'RESOLVED', 'CLOSED')
        )
);