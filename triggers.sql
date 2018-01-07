USE homestead;

DROP TRIGGER IF EXISTS t_driver_special_status;
DELIMITER //
CREATE TRIGGER t_driver_special_status
  BEFORE UPDATE ON drivers
  FOR EACH ROW
  BEGIN
    IF NEW.jobs_taken > 100 THEN
      SET NEW.status = 'Lider przewozów';
    ELSE
      SET NEW.status = '';
    END IF;
  END; //
DELIMITER ;

DROP TRIGGER IF EXISTS t_reservation_update_driver_jobs_taken;
DELIMITER //
CREATE TRIGGER t_reservation_update_driver_jobs_taken
  AFTER INSERT ON reservations
  FOR EACH ROW
  BEGIN
    UPDATE drivers
    SET
      drivers.jobs_taken = drivers.jobs_taken + 1
    WHERE
      drivers.bus_id = NEW.bus_id;
  END //
DELIMITER ;

DROP PROCEDURE IF EXISTS p_increase_ticket_price;
DELIMITER //
CREATE PROCEDURE p_increase_ticket_price (IN dPrice DOUBLE(8,2), IN bus_line INT)
  BEGIN
    UPDATE
      bus_lines
    SET
      bus_lines.price = bus_lines.price + dPrice
    WHERE
      bus_lines.id = bus_line;
  END //
DELIMITER ;
#Podział kierowców na ilosc przerobionch tras
SELECT
  d.first_name,
  d.last_name,
  d.jobs_taken,
  d.bus_id,
  (
    IF(
        d.jobs_taken > 100,
        'Super',
        IF(
            d.jobs_taken > 50,
            'Jako taki',
            'Marny'
        )
    )
  ) AS 'status'
FROM
  drivers d;

# Wykonanie procedury zwiekszania ceny biletów
#USE busapp;
#CALL p_increase_ticket_price(100, 10);