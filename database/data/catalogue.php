<?php

/**
 * Sumber konten katalog dari docs/data.txt.
 *
 * File ini sengaja dipisah dari seeder agar seluruh konten bisa diperiksa
 * tanpa menjalankan database. Seeder hanya bertugas memetakan data ke model.
 */

return [
    'about' => [
        'vision' => 'To be a trusted solution for mining operations through high-performance products that enhance productivity, reliability, and sustainability.',
        'mission' => [
            'Deliver high-quality and high-durability products to support mining activities under demanding operational conditions.',
            'Provide productivity and reliability-oriented solutions to improve work effectiveness and reduce the risk of operational issues.',
            'Ensure product availability and timely distribution through responsive and consistent supply chain management.',
            'Continuous evaluation, technical support, and portfolio development aligned with the evolving needs of the mining industry.',
        ],
        'core_values' => 'Durability - Performance - Reliability - Expertise',
    ],
    'categories' => [
        [
            'slug' => 'large-equipment',
            'kode' => 'LE',
            'nama' => 'LARGE EQUIPMENT',
            'deskripsi' => 'Commonly used in heavy industries such as mining, construction, and material handling. Each machine has a specific function that supports operations like excavation, transportation, and processing of materials.',
            'products' => [
                [
                    'nama' => 'SCRAPER LOADER',
                    'deskripsi' => 'A loader that uses a scraper mechanism to collect and transport bulk materials.',
                ],
                [
                    'nama' => 'COAL FEEDER',
                    'deskripsi' => 'A machine that controls and supplies a steady flow of coal into processing or combustion systems.',
                ],
                [
                    'nama' => 'MONORAIL HANGING',
                    'deskripsi' => 'A monorail system used for transporting workers, tools, or equipment in underground mining environments.',
                ],
                [
                    'nama' => 'SCRAPER',
                    'deskripsi' => 'A heavy machine used to scrape, collect, and move soil or bulk materials across the ground surface.',
                ],
                [
                    'nama' => 'COAL WINNING MACHINE',
                    'deskripsi' => 'A specialized machine designed to extract and cut coal seams efficiently, typically used in underground coal mining.',
                ],
                [
                    'nama' => 'BRIDGE TYPE SCRAPER LOADER',
                    'deskripsi' => 'A material-handling machine that uses a scraper system mounted on a bridge-like structure to move bulk materials.',
                ],
                [
                    'nama' => 'CREEPER',
                    'deskripsi' => 'A sloped conveyor-type machine used to transport materials up or down between different height levels.',
                ],
                [
                    'nama' => 'VIBRATION GRANULATOR',
                    'deskripsi' => 'A machine that forms granules from raw material using vibration processing.',
                ],
                [
                    'nama' => 'STATIONARY HARVESTERS',
                    'deskripsi' => 'A fixed-type mining cart used to store and transport bulk materials such as ore or coal.',
                ],
            ],
        ],
        [
            'slug' => 'equipment-operation',
            'kode' => 'EO',
            'nama' => 'EQUIPMENT OPERATION',
            'deskripsi' => 'Commonly used in mining, industrial transport, and underground material handling. Each vehicle is designed to support specific transportation and operational needs within mining sites or industrial environments.',
            'products' => [
                [
                    'nama' => 'HOPPER CAR',
                    'deskripsi' => 'A large-capacity transport cart with a hopper-shaped container, suitable for handling loose bulk materials.',
                ],
                [
                    'nama' => 'TILTING CAR',
                    'deskripsi' => 'A cart equipped with a tilting mechanism that allows easy unloading of materials by tipping the container.',
                ],
                [
                    'nama' => 'SIDE DUMP CAR',
                    'deskripsi' => 'A cart that unloads materials by dumping them sideways, efficient for operations requiring quick discharge.',
                ],
                [
                    'nama' => 'SLOPE OF VEHICLE',
                    'deskripsi' => 'A specially designed vehicle for transporting workers or materials on inclined mine slopes.',
                ],
                [
                    'nama' => 'SINGLE BEND SIDE DUMP HARVESTER',
                    'deskripsi' => 'A specialized side-dump mining cart with a single-bend design, allowing targeted and controlled unloading.',
                ],
                [
                    'nama' => 'MATERIAL CAR',
                    'deskripsi' => 'A structural frame-style cart used for moving raw materials or support equipment within mining tunnels.',
                ],
                [
                    'nama' => 'FLAT CAR',
                    'deskripsi' => 'A flat-surfaced transport vehicle used to carry large equipment, materials, or machinery components.',
                ],
                [
                    'nama' => 'ELECTRO HYDRAULIC PUSH ROD',
                    'deskripsi' => 'A large tunneling machine equipped with a rotating cutting head, used for underground excavation such as mining tunnels or construction passages.',
                ],
                [
                    'nama' => 'BUFFER BED',
                    'deskripsi' => 'A cushioned support bed that minimizes impact and friction on conveyor belts, improving belt lifespan and reliability.',
                ],
                [
                    'nama' => 'CLEANING DEVICE',
                    'deskripsi' => 'A conveyor belt cleaning tool used to remove material residue and maintain belt efficiency.',
                ],
                [
                    'nama' => 'BELT PEELING MACHINE',
                    'deskripsi' => 'A machine used to strip or peel conveyor belts for repair, maintenance, or installation procedures.',
                ],
                [
                    'nama' => 'ENAMEL CHUTE',
                    'deskripsi' => 'A smooth-surfaced chute used to guide and direct bulk material flow.',
                ],
                [
                    'nama' => 'RAKE TEETH',
                    'deskripsi' => 'A rake-shaped tool used for gathering or moving loose materials in industrial work environments.',
                ],
                [
                    'nama' => 'BUFFER BAR',
                    'deskripsi' => 'A cushioned support bed that minimizes impact and friction on conveyor belts, improving belt lifespan and reliability.',
                ],
                [
                    'nama' => 'BREAKAGE HARVESTER',
                    'deskripsi' => 'A mechanical frame designed to help manage bulk material breaks, improving collection and handling efficiency.',
                ],
                [
                    'nama' => 'MIDDLE SLOT',
                    'deskripsi' => 'A structural trough or slot component typically used in conveyor systems to support and channel material.',
                ],
                [
                    'nama' => 'PERMANENT MAGNET SEPARATOR',
                    'deskripsi' => 'A device that removes metallic impurities from material flow using magnetic force, improving material purity.',
                ],
                [
                    'nama' => 'SHANK BIT BREAKER',
                    'deskripsi' => 'Cutting picks used on a coal shearer machine, designed to break and cut coal seams during mining operations.',
                ],
                [
                    'nama' => 'HYDRAULIC LIFTER',
                    'deskripsi' => 'A hydraulic-powered lifting device used for raising heavy loads or machinery components with precision.',
                ],
                [
                    'nama' => 'SCRAPER CONVEYOR',
                    'deskripsi' => 'Cutting picks used on a coal shearer machine, designed to break and cut coal seams during mining operations.',
                ],
                [
                    'nama' => 'ELECTRIC ROCK LOADER',
                    'deskripsi' => 'An electrically powered underground loader designed for efficient loading and hauling of broken rock in mining operations.',
                ],
                [
                    'nama' => 'ROLLER',
                    'deskripsi' => 'A conveyor roller that supports and guides the movement of the conveyor belt, ensuring smooth operation.',
                ],
                [
                    'nama' => 'SCRAPER LOADER',
                    'deskripsi' => 'A conveyor roller that supports and guides the movement of the conveyor belt, ensuring smooth operation.',
                ],
                [
                    'nama' => 'HYDRAULIC SQUEEZE MACHINE',
                    'deskripsi' => 'A hydraulic-driven machine used for pressing, squeezing, or compacting materials during processing.',
                ],
                [
                    'nama' => 'CAR DUMPER',
                    'deskripsi' => 'Replacement parts and attachments for scraper conveyors, designed to maintain or upgrade conveyor performance.',
                ],
                [
                    'nama' => 'RACKING MACHINE',
                    'deskripsi' => 'A conveyor-based machine used for organized material movement or sorting along a structured line.',
                ],
            ],
        ],
        [
            'slug' => 'support-class',
            'kode' => 'SC',
            'nama' => 'SUPPORT CLASS',
            'deskripsi' => 'Commonly used primarily in underground mining, tunneling, and structural reinforcement. These components provide essential stability, strength, and safety within mining environments.',
            'products' => [
                [
                    'nama' => 'SUSPENSION SINGLE HYDRAULICS PROPS',
                    'deskripsi' => 'A hanging-type hydraulic prop designed for flexible, suspended roof support in mining applications.',
                ],
                [
                    'nama' => 'INDIVIDUAL HYDRAULIC PROP OPEN COLUMN MACHINE',
                    'deskripsi' => 'A specialized machine used to manufacture or open hydraulic prop columns for underground reinforcement.',
                ],
                [
                    'nama' => 'U-CHANNEL STEEL ARCH SUPPORTS WITH CLAMP',
                    'deskripsi' => 'Steel arch structures used to create reinforced tunnel supports, commonly used in underground passages.',
                ],
                [
                    'nama' => 'HYDRAULICS PUSH SLIP',
                    'deskripsi' => 'A hydraulic device used to adjust or slide support structures into the correct position with controlled force.',
                ],
                [
                    'nama' => 'HOLLOW GROUTING ANCHOR',
                    'deskripsi' => 'A hollow anchoring rod used for injecting grout into rock structures, increasing stability and load-bearing capacity.',
                ],
                [
                    'nama' => 'PIPE JOINTS',
                    'deskripsi' => 'Metal pipe connectors used for joining support pipes or hydraulic systems in mining operations.',
                ],
                [
                    'nama' => 'FRP SINGLE HYDRAULIC PROP',
                    'deskripsi' => 'A lift cage used for transporting workers, materials, or equipment inside mine shafts.',
                ],
                [
                    'nama' => 'CAR DUMPER',
                    'deskripsi' => 'Replacement parts and attachments for scraper conveyors, designed to maintain or upgrade conveyor performance.',
                ],
                [
                    'nama' => 'CONVEYOR ROLLER',
                    'deskripsi' => 'A conveyor roller that supports and guides the movement of the conveyor belt, ensuring smooth operation.',
                ],
                [
                    'nama' => 'ROCK BOLT INSTALLATION TOOLS',
                    'deskripsi' => 'The Rock Bolt Installation Tool Set is a specialized tool assembly used in underground mining ground support operations to assist in the installation of rock bolts into rock formations.',
                ],
                [
                    'nama' => 'STEEL GUIDE RAIL',
                    'deskripsi' => 'Steel Guide Rail is a structural steel component used in conveyor and material handling systems to guide and stabilize the movement of materials along a production line.',
                ],
                [
                    'nama' => 'INDIVIDUAL HYDRAULIC PROP',
                    'deskripsi' => 'Cutting picks used on a coal shearer machine, designed to break and cut coal seams during mining operations.',
                ],
            ],
        ],
        [
            'slug' => 'lifting-equipment',
            'kode' => 'LF',
            'nama' => 'LIFTING EQUIPMENT',
            'deskripsi' => 'Commonly used in mining, construction, and industrial applications. Each device serves a specific purpose related to hoisting, pulling, transporting, or tensioning loads.',
            'products' => [
                [
                    'nama' => 'PROP PULLING WINCH',
                    'deskripsi' => 'Designed to pull out hydraulic props or support structures in underground mines.',
                ],
                [
                    'nama' => 'SCHEDULING WINCH',
                    'deskripsi' => 'Used for coordinating and controlling lifting operations, commonly in mining shafts.',
                ],
                [
                    'nama' => 'WINCH ACCESSORIES',
                    'deskripsi' => 'Gears, bushings, and other mechanical components required for maintenance or assembly.',
                ],
                [
                    'nama' => 'RAKE MINE WINCH',
                    'deskripsi' => 'Specialized winch for pulling mining rakes used in ore collection or material movement.',
                ],
                [
                    'nama' => 'LIFTING WINCH',
                    'deskripsi' => 'General-purpose hoisting winch used to lift heavy loads vertically.',
                ],
                [
                    'nama' => 'DOUBLE SPEED WINCH',
                    'deskripsi' => 'Offers two operating speeds for flexible lifting or pulling functions.',
                ],
                [
                    'nama' => 'DAMPER WINCH',
                    'deskripsi' => 'Provides controlled load handling with damping or impact-reduction capabilities.',
                ],
                [
                    'nama' => 'SINKING WINCH',
                    'deskripsi' => 'Used during shaft sinking operations to lower tools, materials, and equipment.',
                ],
                [
                    'nama' => 'HEAD SHEAVE',
                    'deskripsi' => 'A pulley wheel guiding steel wire ropes in lifting systems.',
                ],
                [
                    'nama' => 'TRANSPORT WINCH',
                    'deskripsi' => 'Used for horizontal haulage or transportation of materials.',
                ],
                [
                    'nama' => 'ENDLESS ROPE WINCH',
                    'deskripsi' => 'Uses a continuous loop of rope for long-distance hauling, often in mining transport systems.',
                ],
                [
                    'nama' => 'HAND HOIST',
                    'deskripsi' => 'A manual lifting tool for lighter loads, small repairs, or emergency situations.',
                ],
                [
                    'nama' => 'PNEUMATIC WINCH',
                    'deskripsi' => 'Air-powered winch suitable for hazardous environments where electric sparks must be avoided.',
                ],
                [
                    'nama' => 'DAMPER WINCH',
                    'deskripsi' => 'Another variation designed for smoother load movement and vibration absorption.',
                ],
                [
                    'nama' => 'ROLLER CAGE',
                    'deskripsi' => 'A guiding roller assembly used to stabilize lifting ropes and reduce friction.',
                ],
            ],
        ],
        [
            'slug' => 'drilling-equipment',
            'kode' => 'DE',
            'nama' => 'DRILLING EQUIPMENT',
            'deskripsi' => 'Commonly used in mining, tunneling, construction, and geological exploration. Each tool serves a specific purpose, ranging from roof bolting and rock drilling to groundwater exploration.',
            'products' => [
                [
                    'nama' => 'G10 G20 AIR PICKS',
                    'deskripsi' => 'Pneumatic picks for breaking rock or concrete.',
                ],
                [
                    'nama' => 'PNEUMATIC HAND-HELD DRILL',
                    'deskripsi' => 'A compact pneumatic drill for general drilling operations.',
                ],
                [
                    'nama' => 'HYDRAULIC JUMBOLTER',
                    'deskripsi' => 'A hydraulic bolting machine designed for efficient installation of rock bolts.',
                ],
                [
                    'nama' => 'ROCK DRILL',
                    'deskripsi' => 'A portable drill used for drilling into rock surfaces.',
                ],
                [
                    'nama' => 'HYDRAULIC TUNNEL DRILLING RIG',
                    'deskripsi' => 'A hydraulic drilling rig designed for tunnel construction.',
                ],
                [
                    'nama' => 'GROUNDWATER DRILLING RIG',
                    'deskripsi' => 'A drilling rig used for groundwater exploration and well construction.',
                ],
                [
                    'nama' => 'INDIVIDUAL HYDRAULIC PROP',
                    'deskripsi' => 'Cutting picks used on a coal shearer machine, designed to break and cut coal seams during mining operations.',
                ],
                [
                    'nama' => 'HAND-HELD EMULSION DRILLING RIG',
                    'deskripsi' => 'A portable drilling rig often used in conjunction with emulsion explosives.',
                ],
                [
                    'nama' => 'ELECTRIC DRILL',
                    'deskripsi' => 'An electrically powered drill for medium to heavy drilling tasks.',
                ],
                [
                    'nama' => 'PNEUMATIC IMPACT DRILL',
                    'deskripsi' => 'A pneumatic drill with impact function for breaking and drilling tough materials.',
                ],
                [
                    'nama' => 'CORE DRILL',
                    'deskripsi' => 'A drill used to extract cylindrical rock or concrete samples (core samples).',
                ],
                [
                    'nama' => 'FRAME COLUMN TYPE HYDRAULIC ROTARY DRILL RIG',
                    'deskripsi' => 'A hydraulic rotary drilling rig with a frame column structure.',
                ],
                [
                    'nama' => 'BIT',
                    'deskripsi' => 'Various drill bits used with drilling rigs for different drilling tasks.',
                ],
                [
                    'nama' => 'RAIL DRILL',
                    'deskripsi' => 'A specialized drill used for drilling holes in railway tracks.',
                ],
                [
                    'nama' => 'TUNNEL DRILLING RIG',
                    'deskripsi' => 'A heavy-duty drilling rig for various tunnel excavation tasks.',
                ],
                [
                    'nama' => 'DTH DRILLING RIG',
                    'deskripsi' => 'A rig that uses a down-the-hole hammer for deep and hard-rock drilling.',
                ],
                [
                    'nama' => 'JAW CRUSHER',
                    'deskripsi' => 'A hydraulic rotary drilling rig with a frame column structure.',
                ],
                [
                    'nama' => 'HAMMER CRUSHER',
                    'deskripsi' => 'A portable drilling rig often used in conjunction with emulsion explosives.',
                ],
                [
                    'nama' => 'PICK',
                    'deskripsi' => 'An electrically powered drill for medium to heavy drilling tasks.',
                ],
                [
                    'nama' => 'ELECTRIC PICK',
                    'deskripsi' => 'An electric-powered handheld impact tool used for breaking, chipping, and demolishing concrete or rock surfaces.',
                ],
                [
                    'nama' => 'TPB CRUSHER',
                    'deskripsi' => 'A handheld pneumatic rock breaker used for breaking rock, coal seams, and concrete surfaces in mining and construction operations.',
                ],
                [
                    'nama' => 'INTERNAL COMBUSTION ROCK DRILL',
                    'deskripsi' => 'A portable drilling rig often used in conjunction with emulsion explosives.',
                ],
                [
                    'nama' => 'HAND-HELD ROCK DRILL',
                    'deskripsi' => 'A pneumatic drill with impact function for breaking and drilling tough materials.',
                ],
                [
                    'nama' => 'B87C BREAKER',
                    'deskripsi' => 'A handheld pneumatic or hydraulic rock breaker used for breaking rock, concrete, and coal seams in mining and construction operations.',
                ],
                [
                    'nama' => 'HYDRAULIC ROCK DRILL',
                    'deskripsi' => 'A drill used to extract cylindrical rock or concrete samples (core samples).',
                ],
                [
                    'nama' => 'ROCK DRILL ACCESSORIES',
                    'deskripsi' => 'A specialized drill used for drilling holes in railway tracks.',
                ],
                [
                    'nama' => 'PICK BRAZING',
                    'deskripsi' => 'Various drill bits used with drilling rigs for different drilling tasks.',
                ],
                [
                    'nama' => 'PNEUMATIC TAMPING MACHINE',
                    'deskripsi' => 'A rig that uses a down-the-hole hammer for deep and hard-rock drilling.',
                ],
                [
                    'nama' => 'PNEUMATIC ROCK DRILL',
                    'deskripsi' => 'A heavy-duty drilling rig for various tunnel excavation tasks.',
                ],
            ],
        ],
        [
            'slug' => 'instrumentation',
            'kode' => 'IN',
            'nama' => 'INSTRUMENTATION',
            'deskripsi' => 'A range of industrial electrical equipment designed for hazardous or explosive environments. The products are displayed in rows, each with an accompanying label.',
            'products' => [
                [
                    'nama' => 'METHANE SENSOR',
                    'deskripsi' => 'A handheld methane gas detector used to monitor explosive gas concentrations underground.',
                ],
                [
                    'nama' => 'GYH25 OXYGEN SENSOR',
                    'deskripsi' => 'A device (with wired remote) that measures oxygen concentration to ensure breathable air in mines.',
                ],
                [
                    'nama' => 'METHANE SENSOR CHECK',
                    'deskripsi' => 'A testing kit containing calibration gas cylinders, used to verify methane detector accuracy.',
                ],
                [
                    'nama' => 'GSC200 TYPE VELOCITY SENSOR',
                    'deskripsi' => 'Measures airflow velocity in tunnels and ventilation ducts.',
                ],
                [
                    'nama' => 'TEAR SENSOR',
                    'deskripsi' => 'A flat elongated green panel used to identify tearing or damage on conveyor belts.',
                ],
                [
                    'nama' => 'RUNNING DEVIATION SENSOR',
                    'deskripsi' => 'A mechanical sensor often used on conveyor systems to detect belt misalignment.',
                ],
                [
                    'nama' => 'MINE VENTILATION DOOR OPEN & CLOSE STATUS SENSOR',
                    'deskripsi' => 'A blue sensor unit used to detect whether ventilation doors are open or closed.',
                ],
                [
                    'nama' => 'CARBON MONOXIDE SENSOR',
                    'deskripsi' => 'A portable device designed to detect and measure CO levels for worker protection.',
                ],
                [
                    'nama' => 'SMOKE SENSOR',
                    'deskripsi' => 'A small industrial detector that senses smoke to warn of fire hazards.',
                ],
                [
                    'nama' => 'TEMPERATURE SENSOR',
                    'deskripsi' => 'A portable thermometer-style device that displays temperature readings for environmental monitoring.',
                ],
                [
                    'nama' => 'DUST CONCENTRATION SENSOR',
                    'deskripsi' => 'A thick, multi-core, heavy-duty cable suitable for underground mining and explosive environments.',
                ],
                [
                    'nama' => 'GAS SENSOR',
                    'deskripsi' => 'A multipurpose toxic gas detector, shown in an orange casing.',
                ],
                [
                    'nama' => 'PRESSURE SENSOR',
                    'deskripsi' => 'A pair of handheld pressure measurement devices with digital displays, used to detect pressure levels in industrial systems.',
                ],
                [
                    'nama' => 'CARBON MONOXIDE ALARM',
                    'deskripsi' => 'A blue portable CO alarm with a small screen, worn by miners to warn of dangerous CO levels.',
                ],
                [
                    'nama' => 'METHANE ALARM',
                    'deskripsi' => 'An orange portable alarm that monitors methane gas levels to prevent explosion risks.',
                ],
                [
                    'nama' => 'GAS ALARM',
                    'deskripsi' => 'A compact orange alarm unit used for general toxic gas detection in mining settings.',
                ],
                [
                    'nama' => 'METHANE OFF INSTRUMENT',
                    'deskripsi' => 'An explosion-proof monitoring tool used to measure methane during equipment shutdown and ventilation management.',
                ],
                [
                    'nama' => 'GAS DRAINAGE DETECTOR',
                    'deskripsi' => 'A boxed detector system with cables and control unit, used to measure gas extraction and drainage efficiency in mine boreholes.',
                ],
                [
                    'nama' => 'JG10 LIGHT INTERFEROMETRIC METHANE ANALYZER',
                    'deskripsi' => 'A pair of advanced blue scientific instruments that measure methane concentration with high precision using optical interference technology.',
                ],
                [
                    'nama' => 'METHANE OXYGEN TWO PARAMETER ALARMS',
                    'deskripsi' => 'A dual-function detector that measures both methane and oxygen for comprehensive environmental evaluation.',
                ],
                [
                    'nama' => 'FOUR IN ONE GAS DETECTOR',
                    'deskripsi' => 'A portable multi-gas detector capable of measuring four parameters simultaneously (commonly CH4, CO, O2, and toxic gases), shown with a digital color display.',
                ],
                [
                    'nama' => 'GFW15 WIND SPEED SENSOR',
                    'deskripsi' => 'A compact sensor with LED display designed to measure airflow velocity in underground ventilation systems.',
                ],
                [
                    'nama' => 'GAS PROTRUDING PARAMETER METER',
                    'deskripsi' => 'A multifunctional laboratory-style device for measuring gas expansion and release during excavation or drilling.',
                ],
                [
                    'nama' => 'CARBON MONOXIDE DETECTOR',
                    'deskripsi' => 'A yellow handheld unit with screen and control buttons, used to measure carbon monoxide concentration.',
                ],
                [
                    'nama' => 'LASER POINTING INSTRUMENT',
                    'deskripsi' => 'A high-accuracy laser device built for precise alignment, targeting, and positioning tasks during industrial operations.',
                ],
                [
                    'nama' => 'DUST GAUGE',
                    'deskripsi' => 'Robust particulate measurement tool designed to monitor dust concentration and support effective air-quality management.',
                ],
                [
                    'nama' => 'CCA1000 DIRECT READING INSTRUMENT',
                    'deskripsi' => 'A digital display system delivering real-time monitoring of environmental and operational metrics critical to worker safety.',
                ],
                [
                    'nama' => 'SPRINKLER SYSTEM',
                    'deskripsi' => 'A reliable fire-control module designed for automated fire suppression in high-risk industrial zones.',
                ],
                [
                    'nama' => 'DFA MECHANICAL ANEMOMETER',
                    'deskripsi' => 'A precision airflow measurement device widely used in ventilation testing, tunnel airflow analysis, and environmental monitoring.',
                ],
                [
                    'nama' => 'INFRARED THERMOMETER',
                    'deskripsi' => 'Fast, contact-free temperature measurement with instant digital readouts—ideal for machinery diagnostics and field inspections.',
                ],
                [
                    'nama' => 'LASER RANGEFINDER',
                    'deskripsi' => 'Compact and powerful, providing exact distance measurements for surveying, layout, and field engineering.',
                ],
                [
                    'nama' => 'ROOF RELEASE INSTRUMENT',
                    'deskripsi' => 'A specialized tool designed for roof-support evaluation and safety inspection in mining and tunnel operations.',
                ],
                [
                    'nama' => 'VIBRATION RESISTANT PRESSURE GAUGE',
                    'deskripsi' => 'Durable gauges engineered to resist heavy vibration, ensuring stable and accurate pressure readings for industrial systems.',
                ],
                [
                    'nama' => 'WIRE ROPE FLAW DETECTOR',
                    'deskripsi' => 'A non-destructive testing system used to detect internal and external wire rope defects, preventing failures and downtime.',
                ],
                [
                    'nama' => 'MULTIPARAMETER GAS DETECTOR',
                    'deskripsi' => 'Detects multiple hazardous gases simultaneously, equipped with alarms and a clear display to ensure threat-free working environments.',
                ],
                [
                    'nama' => 'NOISE DETECTOR',
                    'deskripsi' => 'A handheld sound-level meter for monitoring workplace noise exposure and maintaining compliance with safety regulations.',
                ],
            ],
        ],
        [
            'slug' => 'chemical',
            'kode' => 'CH',
            'nama' => 'CHEMICAL',
            'deskripsi' => 'A comprehensive range of industrial-grade chemical materials designed for mining operations, safety applications, fire suppression, environmental protection, and construction support. Each product is engineered to deliver high performance, stability, and reliability in demanding field conditions.',
            'products' => [
                [
                    'nama' => 'SOOT REMOVER',
                    'deskripsi' => 'Soot Remover Liquid is a chemical cleaning agent used to dissolve and remove carbon soot, smoke residue, and combustion deposits from engine parts, exhaust systems, boilers, furnaces, and mining equipment surfaces.',
                ],
                [
                    'nama' => 'DUST RETARDANT',
                    'deskripsi' => 'Dust Retardant Liquid is a chemical solution used to control, suppress, and reduce airborne dust in mining areas, haul roads, stockpiles, conveyor lines, and material handling zones.',
                ],
                [
                    'nama' => 'SEALING AGENT',
                    'deskripsi' => 'A high-viscosity chemical, supplied in plastic drums, used to seal cracks, mine walls, or equipment.',
                ],
                [
                    'nama' => 'RADIATOR COOLANT',
                    'deskripsi' => 'Radiator Coolant is a liquid cooling fluid used in diesel engines, heavy equipment, generators, and mining machinery to regulate engine temperature and prevent overheating. THANK YOU',
                ],
            ],
        ],
    ],
];
