This is a simple demo to demonstrate the effects of a SQL injection attack. 
Every part of the website is covered, but the developer left out escaping the search text on the available users component. 
This is especially bad since this search outputs the results to a table. Yikes.