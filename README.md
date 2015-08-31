# Compare-two-XML-files

Compares two XML files, old.xml and new.xml

Gets the XML files, pulls out the product IDs and adds them to arrays

Loops through the old XML file and checks each product ID to see if it exists in the array of new product IDs. If it doesn't exist, the product must have been taken out of stock.

Loops through the new XML file and check each product ID to see if it exists in the array of old product IDs. If it doesn't exist the product must be new in stock, or back in stock. 

