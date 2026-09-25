USE smart_campus_db;

INSERT INTO INVENTORY_TRANSACTION (
    item_id,
    transaction_type,
    quantity,
    transaction_date,
    reference_no,
    remarks
) VALUES

(1, 'IN', 50, '2026-01-05 10:15:00',
 'PO-2026-001', 'A4 paper received from stationery supplier'),

(1, 'OUT', 15, '2026-01-12 11:30:00',
 'ISS-2026-001', 'Paper issued to administration department'),

(1, 'IN', 40, '2026-02-03 09:45:00',
 'PO-2026-014', 'Monthly stationery stock received'),

(1, 'OUT', 10, '2026-02-15 14:20:00',
 'ISS-2026-018', 'Paper issued for academic documentation'),

(2, 'IN', 10, '2026-01-08 12:00:00',
 'PO-2026-003', 'Printer toner received'),

(2, 'OUT', 3, '2026-01-20 15:10:00',
 'ISS-2026-007', 'Toner issued to administration office'),

(2, 'IN', 15, '2026-03-02 10:30:00',
 'PO-2026-027', 'Additional printer toner received'),

(3, 'IN', 300, '2026-01-10 09:30:00',
 'PO-2026-005', 'Cat6 cable stock received'),

(3, 'OUT', 75, '2026-01-25 13:00:00',
 'ISS-2026-012', 'Cables issued for network laboratory'),

(3, 'OUT', 50, '2026-02-18 11:45:00',
 'ISS-2026-021', 'Cables issued for campus network maintenance'),

(3, 'IN', 200, '2026-03-05 10:00:00',
 'PO-2026-031', 'Network cable replenishment'),

(4, 'IN', 25, '2026-01-12 10:20:00',
 'PO-2026-008', 'HDMI cables received'),

(4, 'OUT', 8, '2026-01-28 12:30:00',
 'ISS-2026-015', 'HDMI cables issued to seminar facilities'),

(4, 'IN', 20, '2026-02-25 09:50:00',
 'PO-2026-024', 'HDMI cable replenishment'),

(5, 'IN', 20, '2026-01-15 11:10:00',
 'PO-2026-010', 'USB keyboards received'),

(5, 'OUT', 5, '2026-02-02 14:00:00',
 'ISS-2026-025', 'Keyboards issued to computer laboratory'),

(6, 'IN', 25, '2026-01-16 11:40:00',
 'PO-2026-011', 'USB optical mice received'),

(6, 'OUT', 7, '2026-02-04 13:30:00',
 'ISS-2026-028', 'Mice issued to programming laboratory'),

(7, 'IN', 30, '2026-01-18 10:25:00',
 'PO-2026-013', 'USB flash drives received'),

(7, 'OUT', 10, '2026-02-10 15:00:00',
 'ISS-2026-034', 'USB drives issued for academic project work'),

(8, 'IN', 10, '2026-01-22 09:40:00',
 'PO-2026-016', 'Soldering wire received'),

(8, 'OUT', 3, '2026-02-12 12:15:00',
 'ISS-2026-037', 'Soldering wire issued to electronics laboratory'),

(9, 'IN', 20, '2026-01-25 10:00:00',
 'PO-2026-018', 'Thermal paste received'),

(9, 'OUT', 6, '2026-02-20 14:30:00',
 'ISS-2026-041', 'Thermal paste issued for computer maintenance'),

(10, 'IN', 20, '2026-01-28 11:00:00',
 'PO-2026-020', 'Rechargeable batteries received'),

(10, 'OUT', 5, '2026-02-22 13:45:00',
 'ISS-2026-044', 'Batteries issued to electrical laboratory'),

(11, 'IN', 30, '2026-02-01 10:30:00',
 'PO-2026-022', 'RJ45 connectors received'),

(11, 'OUT', 12, '2026-02-24 15:20:00',
 'ISS-2026-047', 'Connectors issued for networking work'),

(12, 'IN', 10, '2026-02-05 09:15:00',
 'PO-2026-026', 'Electronic contact cleaner received'),

(12, 'OUT', 3, '2026-02-26 11:50:00',
 'ISS-2026-049', 'Contact cleaner issued for equipment maintenance');