<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Home',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'username' => 'Username',
            'full_name' => 'Full Name',
            'email' => 'Email',
            'password' => 'Password',
        ],
    ],

    'campuses' => [
        'name' => 'Campuses',
        'index_title' => 'Campuses List',
        'new_title' => 'New Campus',
        'create_title' => 'Create Campus',
        'edit_title' => 'Edit Campus',
        'show_title' => 'Show Campus',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'buildings' => [
        'name' => 'Buildings',
        'index_title' => 'Buildings List',
        'new_title' => 'New Building',
        'create_title' => 'Create Building',
        'edit_title' => 'Edit Building',
        'show_title' => 'Show Building',
        'inputs' => [
            'name' => 'Name',
            'campuse_id' => 'Campus',
        ],
    ],

    'directors' => [
        'name' => 'Directors',
        'index_title' => 'Directors List',
        'new_title' => 'New Director',
        'create_title' => 'Create Director',
        'edit_title' => 'Edit Director',
        'show_title' => 'Show Director',
        'inputs' => [
            'full_name' => 'Full Name',
            'sex' => 'Sex',
            'email' => 'Email',
            'phone' => 'Phone',
        ],
    ],

    'leaders' => [
        'name' => 'Leaders',
        'index_title' => 'Leaders List',
        'new_title' => 'New Leader',
        'create_title' => 'Create Leader',
        'edit_title' => 'Edit Leader',
        'show_title' => 'Show Leader',
        'inputs' => [
            'full_name' => 'Full Name',
            'sex' => 'Sex',
            'phone' => 'Phone',
            'email' => 'Email',
        ],
    ],

    'problems' => [
        'name' => 'Problems',
        'index_title' => 'Problems List',
        'new_title' => 'New Problem',
        'create_title' => 'Create Problem',
        'edit_title' => 'Edit Problem',
        'show_title' => 'Show Problem',
        'inputs' => [
            'name' => 'Name',
            'description' => 'Description',
            'problem_catagory_id' => 'Problem Category',
        ],
    ],

    'units' => [
        'name' => 'Units',
        'index_title' => 'Units List',
        'new_title' => 'New Unit',
        'create_title' => 'Create Unit',
        'edit_title' => 'Edit Unit',
        'show_title' => 'Show Unit',
        'inputs' => [
            'telephone' => 'Telephone',
            'fax' => 'Fax',
            'email' => 'Email',
            'campuse_id' => 'Campus',
            'director_id' => 'Director',
        ],
    ],

    'service_units' => [
        'name' => 'Service Units',
        'index_title' => 'ServiceUnits List',
        'new_title' => 'New Service unit',
        'create_title' => 'Create ServiceUnit',
        'edit_title' => 'Edit ServiceUnit',
        'show_title' => 'Show ServiceUnit',
        'inputs' => [
            'name' => 'Name',
            'telephone' => 'Telephone',
            'fax' => 'Fax',
            'email' => 'Email',
            'discription' => 'Discription',
            'leader_id' => 'Leader',
        ],
    ],

    'user_supports' => [
        'name' => 'User Supports',
        'index_title' => 'UserSupports List',
        'new_title' => 'New User support',
        'create_title' => 'Create UserSupport',
        'edit_title' => 'Edit UserSupport',
        'show_title' => 'Show UserSupport',
        'inputs' => [
            'user_id' => 'User',
            'user_type' => 'User Type',
            'problem_catagory_id' => 'Problem Category',
            'building_id' => 'Building',
            'service_unit_id' => 'Service Unit',
            'unit_id' => 'Unit',
        ],
    ],

    'assigned_offices' => [
        'name' => 'Assigned Offices',
        'index_title' => 'AssignedOffices List',
        'new_title' => 'New Assigned office',
        'create_title' => 'Create AssignedOffice',
        'edit_title' => 'Edit AssignedOffice',
        'show_title' => 'Show AssignedOffice',
        'inputs' => [
            'office_no' => 'Office No',
            'building_id' => 'Building',
        ],
    ],

    'priorities' => [
        'name' => 'Priorities',
        'index_title' => 'Priorities List',
        'new_title' => 'New Priority',
        'create_title' => 'Create Priority',
        'edit_title' => 'Edit Priority',
        'show_title' => 'Show Priority',
        'inputs' => [
            'name' => 'Name',
            'response' => 'Response',
            'description' => 'Description',
        ],
    ],

    'organizational_units' => [
        'name' => 'Org Units',
        'index_title' => 'Org Units List',
        'new_title' => 'New Org unit',
        'create_title' => 'Create Org Unit',
        'edit_title' => 'Edit Org Unit',
        'show_title' => 'Show Org Unit',
        'inputs' => [
            'name' => 'Name',
            'offcie_no' => 'Office No',
            'campuse_id' => 'Campus',
            'building_id' => 'Building',
            'prioritie_id' => 'Priority',
        ],
    ],

    'assigned_org_units' => [
        'name' => 'Assigned Org Units',
        'index_title' => 'AssignedOrgUnits List',
        'new_title' => 'New Assigned org unit',
        'create_title' => 'Create AssignedOrgUnit',
        'edit_title' => 'Edit AssignedOrgUnit',
        'show_title' => 'Show AssignedOrgUnit',
        'inputs' => [
            'assigned_office_id' => 'Assigned Office',
            'organizational_unit_id' => 'Org Unit',
        ],
    ],

    'floors' => [
        'name' => 'Floors',
        'index_title' => 'Floors List',
        'new_title' => 'New Floor',
        'create_title' => 'Create Floor',
        'edit_title' => 'Edit Floor',
        'show_title' => 'Show Floor',
        'inputs' => [
            'name' => 'Name',
            'description' => 'Description',
        ],
    ],

    'customers' => [
        'name' => 'Customers',
        'index_title' => 'Customers List',
        'new_title' => 'New Customer',
        'create_title' => 'Create Customer',
        'edit_title' => 'Edit Customer',
        'show_title' => 'Show Customer',
        'inputs' => [
            'full_name' => 'Full Name',
            'email' => 'Email',
            'phone_no' => 'Phone No',
            'building_id' => 'Building',
            'campus_id' => 'Campus',
            'organizational_unit_id' => 'Org Unit',
            'floor_id' => 'Floor',
            'user_id' => 'User',
            'is_edited' => 'Is Edited',
            'office_num' => 'Office No',
        ],
    ],

    'tickets' => [
        'name' => 'Tickets',
        'index_title' => 'Tickets List',
        'new_title' => 'New Ticket',
        'create_title' => 'Create Ticket',
        'edit_title' => 'Edit Customer',
        'show_title' => 'Show Customer',
            'full_name' => 'Full Name',
            'email' => 'Email',
            'phone_no' => 'Phone No',
            'building_id' => 'Building',
            'campus_id' => 'Campus',
            'floor_id' => 'Floor',
            'user_id' => 'User',
            'is_edited' => 'Is Edited',
            'office_num' => 'Office No',
        ],
    

    'director_units' => [
        'name' => 'Director Units',
        'index_title' => 'Units List',
        'new_title' => 'New Unit',
        'create_title' => 'Create Unit',
        'edit_title' => 'Edit Unit',
        'show_title' => 'Show Unit',
        'inputs' => [
            'telephone' => 'Telephone',
            'fax' => 'Fax',
            'email' => 'Email',
            'campuse_id' => 'Campus',
        ],
    ],  

    'user_support_tickets' => [
        'name' => 'UserSupport Tickets',
        'index_title' => 'Tickets List',
        'new_title' => 'New Ticket',
        'create_title' => 'Create Ticket',
        'edit_title' => 'Edit Ticket',
        'show_title' => 'Show Ticket',
        'inputs' => [
            'status' => 'Status',
            'description' => 'Description',
            'campuse_id' => 'Campus',
            'problem_id' => 'Problem',
            'organizational_unit_id' => 'Org Unit',
            'prioritie_id' => 'Priority',
        ],
    ],

    'building_user_supports' => [
        'name' => 'Building User Supports',
        'index_title' => 'UserSupports List',
        'new_title' => 'New User support',
        'create_title' => 'Create UserSupport',
        'edit_title' => 'Edit UserSupport',
        'show_title' => 'Show UserSupport',
        'inputs' => [
            'user_id' => 'User',
            'user_type' => 'User Type',
            'problem_catagory_id' => 'Problem Catagory',
            'service_unit_id' => 'Service Unit',
            'unit_id' => 'Unit',
        ],
    ],

    'building_customers' => [
        'name' => 'Building Customers',
        'index_title' => 'Customers List',
        'new_title' => 'New Customer',
        'create_title' => 'Create Customer',
        'edit_title' => 'Edit Customer',
        'show_title' => 'Show Customer',
        'inputs' => [
            'full_name' => 'Full Name',
            'email' => 'Email',
            'phone_no' => 'Phone No',
            'campus_id' => 'Campus',
            'organizational_unit_id' => 'Org Unit',
            'floor_id' => 'Floor',
            'user_id' => 'User',
            'is_edited' => 'Is Edited',
            'office_num' => 'Office Num',
        ],
    ],

    'service_unit_user_supports' => [
        'name' => 'ServiceUnit User Supports',
        'index_title' => 'UserSupports List',
        'new_title' => 'New User support',
        'create_title' => 'Create UserSupport',
        'edit_title' => 'Edit UserSupport',
        'show_title' => 'Show UserSupport',
        'inputs' => [
            'user_id' => 'User',
            'user_type' => 'User Type',
            'problem_catagory_id' => 'Problem Catagory',
            'building_id' => 'Building',
            'unit_id' => 'Unit',
        ],
    ],

    'prioritie_tickets' => [
        'name' => 'Prioritie Tickets',
        'index_title' => 'Tickets List',
        'new_title' => 'New Ticket',
        'create_title' => 'Create Ticket',
        'edit_title' => 'Edit Ticket',
        'show_title' => 'Show Ticket',
        'inputs' => [
            'status' => 'Status',
            'description' => 'Description',
            'campuse_id' => 'Campus',
            'problem_id' => 'Problem',
            'organizational_unit_id' => 'Org Unit',
            'user_support_id' => 'User Support',
        ],
    ],

    'organizational_unit_tickets' => [
        'name' => 'OrganizationalUnit Tickets',
        'index_title' => 'Tickets List',
        'new_title' => 'New Ticket',
        'create_title' => 'Create Ticket',
        'edit_title' => 'Edit Ticket',
        'show_title' => 'Show Ticket',
        'inputs' => [
            'status' => 'Status',
            'description' => 'Description',
            'campuse_id' => 'Campus',
            'problem_id' => 'Problem',
            'user_support_id' => 'User Support',
            'prioritie_id' => 'Prioritie',
        ],
    ],

    'problem_catagories' => [
        'name' => 'Problem Catagories',
        'index_title' => 'ProblemCatagories List',
        'new_title' => 'New Problem catagory',
        'create_title' => 'Create ProblemCatagory',
        'edit_title' => 'Edit ProblemCatagory',
        'show_title' => 'Show ProblemCatagory',
        'inputs' => [
            'name' => 'Name',
            'description' => 'Description',
        ],
    ],

    'building_organizational_units' => [
        'name' => 'Building Org Units',
        'index_title' => 'OrganizationalUnits List',
        'new_title' => 'New Org Unit',
        'create_title' => 'Create OrganizationalUnit',
        'edit_title' => 'Edit OrganizationalUnit',
        'show_title' => 'Show OrganizationalUnit',
        'inputs' => [
            'name' => 'Name',
            'offcie_no' => 'Offcie No',
            'campuse_id' => 'Campus',
            'prioritie_id' => 'Prioritie',
        ],
    ],

    'leader_user_supports' => [
        'name' => 'Leader User Supports',
        'index_title' => 'UserSupports List',
        'new_title' => 'New User support',
        'create_title' => 'Create UserSupport',
        'edit_title' => 'Edit UserSupport',
        'show_title' => 'Show UserSupport',
        'inputs' => [
            'user_id' => 'User',
            'user_type' => 'User Type',
            'problem_catagory_id' => 'Problem Catagory',
            'building_id' => 'Building',
            'service_unit_id' => 'Service Unit',
            'unit_id' => 'Unit',
        ],
    ],

    'unit_service_units' => [
        'name' => 'Unit Service Units',
        'index_title' => 'ServiceUnits List',
        'new_title' => 'New Service unit',
        'create_title' => 'Create ServiceUnit',
        'edit_title' => 'Edit ServiceUnit',
        'show_title' => 'Show ServiceUnit',
        'inputs' => [
            'name' => 'Name',
            'telephone' => 'Telephone',
            'fax' => 'Fax',
            'email' => 'Email',
            'discription' => 'Discription',
            'leader_id' => 'Leader',
        ],
    ],

    'tickets' => [
        'name' => 'Tickets',
        'index_title' => 'Tickets List',
        'new_title' => 'New Ticket',
        'create_title' => 'Create Ticket',
        'edit_title' => 'Edit Ticket',
        'show_title' => 'Show Ticket',
        'inputs' => [
            'status' => 'Status',
            'description' => 'Description',
            'campuse_id' => 'Campus',
            'customer_id' => 'Customer',
            'problem_id' => 'Problem',
            'organizational_unit_id' => 'Org Unit',
            'user_support_id' => 'User Support',
            'prioritie_id' => 'Prioritie',
        ],
    ],

    'customer_tickets' => [
        'name' => 'Customer Tickets',
        'index_title' => 'Tickets List',
        'new_title' => 'New Ticket',
        'create_title' => 'Create Ticket',
        'edit_title' => 'Edit Ticket',
        'show_title' => 'Show Ticket',
        'inputs' => [
            'status' => 'Status',
            'description' => 'Description',
            'campuse_id' => 'Campus',
            'problem_id' => 'Problem',
            'organizational_unit_id' => 'Org Unit',
            'user_support_id' => 'User Support',
            'prioritie_id' => 'Prioritie',
        ],
    ],

    'user_support_escalated_tickets' => [
        'name' => 'UserSupport Escalated Tickets',
        'index_title' => 'EscalatedTickets List',
        'new_title' => 'New Escalated ticket',
        'create_title' => 'Create EscalatedTicket',
        'edit_title' => 'Edit EscalatedTicket',
        'show_title' => 'Show EscalatedTicket',
        'inputs' => [
            'ticket_id' => 'Ticket',
            'queue_type_id' => 'Queue Type',
        ],
    ],

    'escalated_tickets' => [
        'name' => 'Escalated Tickets',
        'index_title' => 'EscalatedTickets List',
        'new_title' => 'New Escalated ticket',
        'create_title' => 'Create EscalatedTicket',
        'edit_title' => 'Edit EscalatedTicket',
        'show_title' => 'Show EscalatedTicket',
        'inputs' => [
            'ticket_id' => 'Ticket',
            'user_support_id' => 'User Support',
            'queue_type_id' => 'Queue Type',
        ],
    ],

    'all_reports' => [
        'name' => 'All Reports',
        'index_title' => 'AllReports List',
        'new_title' => 'New Reports',
        'create_title' => 'Create Reports',
        'edit_title' => 'Edit Reports',
        'show_title' => 'Show Reports',
        'inputs' => [
            'user_support_id' => 'User Support',
        ],
    ],

    'reports_tickets' => [
        'name' => 'Reports Tickets',
        'index_title' => 'Tickets List',
        'new_title' => 'New Ticket',
        'create_title' => 'Create Ticket',
        'edit_title' => 'Edit Ticket',
        'show_title' => 'Show Ticket',
        'inputs' => [
            'status' => 'Status',
            'description' => 'Description',
            'campuse_id' => 'Campus',
            'customer_id' => 'Customer',
            'problem_id' => 'Problem',
            'organizational_unit_id' => 'Org Unit',
            'user_support_id' => 'User Support',
            'prioritie_id' => 'Prioritie',
        ],
    ],
    'director_leaders' => [
        'name' => 'Director Leaders',
        'index_title' => 'Leaders List',
        'new_title' => 'New Leader',
        'create_title' => 'Create Leader',
        'edit_title' => 'Edit Leader',
        'show_title' => 'Show Leader',
        'inputs' => [
            'full_name' => 'Full Name',
            'sex' => 'Sex',
            'phone' => 'Phone',
            'user_id' => 'User',
            'email' => 'Email',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];
