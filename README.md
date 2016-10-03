# Compare-two-XML-files

Compares two XML files, old.xml and new.xml

Use case: A supplyer has a product feed that removes the products from the feed when they are taken out of stock. This is problematic because the website will remove the product if it does not exist in the product feed. If a product comes from another suppler, the product will not be in the feed and therefore be removed form the website. The supplyer's feed can be pulled onto localhost and called new.xml. When there is a new version, new.xml can be moved to old.xml and the new file can be retreived form the server and called new.xml. Then open up the PHP script in your browser to see the products that have been taken out of stock, along with the products that are new in stock. 

Gets the XML files, pulls out the product IDs and adds them to arrays

Loops through the old XML file and checks each product ID to see if it exists in the array of new product IDs. If it doesn't exist, the product must have been taken out of stock.

Loops through the new XML file and check each product ID to see if it exists in the array of old product IDs. If it doesn't exist the product must be new in stock, or back in stock. 

For a full guide on this script visit: https://www.techcress.com/compare-two-xml-files-and-output-the-difference-with-php/
