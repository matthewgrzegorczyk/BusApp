DELIMITER //
  CREATE TRIGGER t_driver_special_status
    BEFORE INSERT ON drivers
    FOR EACH ROW
    BEGIN
      IF NEW.jobs_taken < 100 THEN
        SET NEW.status = 'Lider przewozów';
      END IF;
    END; //
DELIMITER ;


DELIMITER //
  CREATE PROCEDURE p_increase_ticket_price (IN dPrice DOUBLE(8,2), IN bus_line INT)
    BEGIN
      UPDATE
        bus_lines
      SET
        bus_lines.price = bus_lines.price + dPrice
      WHERE
        bus_lines.id = bus_line
    END //
DELIMITER ;


