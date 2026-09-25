USE smart_campus_db;

INSERT INTO INVENTORY_ITEM (
    item_code,
    item_name,
    category,
    unit,
    minimum_stock,
    current_stock,
    storage_location,
    status
) VALUES
(
    'INV-PAP-001',
    'A4 Copier Paper',
    'Stationery',
    'REAM',
    20,
    75,
    'Central Store - Shelf A1',
    'ACTIVE'
),
(
    'INV-TON-001',
    'HP Laser Printer Toner',
    'Printer Consumables',
    'CARTRIDGE',
    5,
    18,
    'Central Store - Shelf A2',
    'ACTIVE'
),
(
    'INV-CAB-001',
    'Cat6 Ethernet Cable',
    'Networking',
    'METER',
    100,
    450,
    'IT Store - Rack B1',
    'ACTIVE'
),
(
    'INV-CAB-002',
    'HDMI Cable',
    'Audio Visual',
    'PIECE',
    10,
    35,
    'AV Store - Rack C1',
    'ACTIVE'
),
(
    'INV-KEY-001',
    'USB Keyboard',
    'Computer Peripheral',
    'PIECE',
    10,
    28,
    'IT Store - Rack B2',
    'ACTIVE'
),
(
    'INV-MOU-001',
    'USB Optical Mouse',
    'Computer Peripheral',
    'PIECE',
    10,
    32,
    'IT Store - Rack B2',
    'ACTIVE'
),
(
    'INV-USB-001',
    'USB Flash Drive 32GB',
    'Storage Device',
    'PIECE',
    15,
    40,
    'IT Store - Rack B3',
    'ACTIVE'
),
(
    'INV-SOL-001',
    'Lead-Free Soldering Wire',
    'Electronics Consumable',
    'ROLL',
    5,
    16,
    'ENTC Store - Shelf D1',
    'ACTIVE'
),
(
    'INV-THR-001',
    'Thermal Paste',
    'Computer Consumable',
    'TUBE',
    10,
    24,
    'IT Store - Rack B4',
    'ACTIVE'
),
(
    'INV-BAT-001',
    'AA Rechargeable Battery',
    'Electrical Consumable',
    'PACK',
    10,
    30,
    'Electrical Store - Shelf E1',
    'ACTIVE'
),
(
    'INV-CON-001',
    'RJ45 Network Connector',
    'Networking',
    'PACK',
    10,
    25,
    'IT Store - Rack B1',
    'ACTIVE'
),
(
    'INV-CLE-001',
    'Electronic Contact Cleaner',
    'Maintenance Consumable',
    'CAN',
    5,
    12,
    'Maintenance Store - Shelf F1',
    'ACTIVE'
);