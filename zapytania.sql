# 1

SELECT
	r.tickets_amount, r.ticket_type, r.destination, r.full_name, r.date, YEARWEEK(r.date) AS 'Numer Tygodnia'
FROM
	reservations r
WHERE
	YEARWEEK(r.date, 1) = (YEARWEEK(NOW(), 1) + 1) - 1;

SELECT
	WEEKDAY(r.date) AS 'Dzień tygodnia', COUNT(*) AS 'Liczba'
FROM
	reservations r
WHERE
	YEARWEEK(r.date, 1) = (YEARWEEK(NOW(), 1) + 1) - 1
GROUP BY
	DAY(r.date);


# 2
SELECT 
	* 
FROM 
	reservations 
WHERE 
	DATEDIFF(NOW(), reservations.date) > 10;

# 3
SELECT
	YEAR(reservations.date), MONTH(reservations.date), MONTH(NOW())
FROM
	reservations
WHERE (
    MONTH(reservations.date) = (MONTH(NOW()) - 1)
    AND
	YEAR(reservations.date) = YEAR(NOW())
)
OR (
	MONTH(reservations.date) = 12
	AND
	YEAR(reservations.date) = (YEAR(NOW()) - 1)
);

# 4
SELECT
	user_id, COUNT(user_id)
FROM
	reservations
GROUP BY
	user_id
HAVING
	COUNT(user_id) > (
        SELECT 
        	COUNT(*) / COUNT(DISTINCT user_id)
       	FROM 
        	reservations 
        WHERE 
        	YEAR(reservations.date) = YEAR(NOW()) - 1
    )

# 5
SELECT
	*
FROM
	reservations
WHERE (
    QUARTER(reservations.date) = (QUARTER(NOW()) - 1)
    AND
	YEAR(reservations.date) = YEAR(NOW())
)
OR (
	QUARTER(reservations.date) = 4
	AND
	YEAR(reservations.date) = (YEAR(NOW()) - 1)
);
