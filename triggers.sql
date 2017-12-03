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
  CREATE PROCEDURE p_increase_ticket_price (IN price INT, IN )
    BEGIN
      SELECT * FROM bus_lines;
    END;
  //
DELIMITER ;