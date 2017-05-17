Project: Timely Grocery: - APPROVED

Link on AWS:  http://ec2-54-215-248-154.us-west-1.compute.amazonaws.com/

Problem:

Every year United States throws away one-thirds of the food it produces causing billion dollar wastage. It is known fact that some of major retailers dispose a lot of food into the trash well before their sell by dates to replace with new stock. Even though some stores offer these products at cheaper prices before disposing them, consumers are unaware about these deals and the store locations which offer them. As a result the stores are not able to make proper sales resulting in the wastage of precious food.

Solution:

Our solution was to tackle this food wastage by creating a online platform for the sellers of retail outlets to post about these items with specific details about products as below.

a)Product Name b)Quantity c)Sell-by-date d)actual price e)discounted price e)details about condition and physical damage if any.

When a customer/buyer logins into the portal he can view the products according to each category or search for the required products. In the results we show him the product along with lowest price offered per/unit and discount offered.

When customer clicks into product details the customer can check details about all the stores which sell the product and the discounted prices and expiration date offered by each store. After detecting the customer’s browser location we will show the distance to each store so that customer can filter the stores near to his home and also check the driving route for the stores. This provides customer flexibility to buy products suitable to his need at affordable price.

![Product price comparison](https://github.com/SJSU272LabS17/Project-Team-2/blob/master/project/images/productcomparision.png)

Future enhancements:

To provide scalability by extracting the product information from the retail stores database regularly, at present vendor enters each product details manually.

Providing an option for customer to request products for lower price (ex: when sell-by-date is less than week). If product receives multiple requests seller can choose the best deal according to price and no of units requested.

Including Machine learning to study the purchase data about each product to provide suggestions for vendor to lower/increase the product price based on the sales.

Application Architecture:

The front end of the website is designed using HTML, CSS, Bootstrap and Javascript. For server side programming we have used PHP and for storing and retrieving the data we have used MySQL in Amazon-Rds. The application is hosted on the cloud using amazon aws ec2 instance.
