@script_init_db.sql;
@lecalendar_account_package.sql;
@lecalendar_external_package.sql
@script_triggers.sql;
commit;
@script_populate_db.sql;
--rollback;
commit;


