-- 
DELIMITER $$

CREATE TRIGGER customers_balance
    AFTER INSERT
    ON invoice_item_list FOR EACH ROW
BEGIN
UPDATE customers 
SET customers.balance = (
    SELECT invoice_item_list.amount 
    FROM invoice_item_list
    WHERE invoice_item_list.user_id = customers.id order by invoice_item_list.id desc limit 1
) + customers.balance;
END$$
-- 

-- 
DROP TRIGGER IF EXISTS customer_control.customers_balance;
-- 

DELIMITER ;



-- 
DELIMITER $$

CREATE TRIGGER customers_balance_update
    AFTER INSERT
    ON payments FOR EACH ROW
BEGIN
UPDATE customers 
SET customers.balance = customers.balance - (
    SELECT payments.amount 
    FROM payments
    WHERE payments.customer_id = customers.id order by payments.id desc limit 1
);
END$$
-- 