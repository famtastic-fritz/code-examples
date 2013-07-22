SELECT
    employees.username
    , emails.employee_email
    , employees.start_date
    , employees.salary
    , company.name
FROM
    testDBin.employees
    INNER JOIN testDBin.emails 
        ON (employees.email1 = emails.id)
    INNER JOIN testDBin.company 
        ON (employees.company_id = company.id)
WHERE (emails.employee_email emails.id = employes.email1
    AND company.name id = employees.company_id AND employees.permission_level =1
    AND employees.is_permission_level_active= 1);