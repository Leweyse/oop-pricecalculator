# PHP Price Calculator

### PHP Exercise 08/11/2021 - 12/11/2021

# Aim of the project:
Making an OOP price calculator based on the data in our demo database!

## Day 1
* Ran the SQL code to add 3 additional tables to the **classicmodels** database
* Enabled the MySQLi extension in the php.ini file for connecting PHP with the MySQL database
* Created a **Product** class to contain the relevant data for each product
* Created a **Connection** class to store the data across the session, gave it a **mysqli** connection property and a Product property
* Instantiated a Connection object on the logic page to test data retrieval with the inbuilt mysqli class, with the .env security file measure active

## Day 2
Took a slightly wrong approach to the exercise, but were still incredibly productive, and our one function to rule them all has crushed all the limit testing. Accounts for every edge case known to man. Very proud. [setData][ff]

## Day 3
* Use SQL to query database for only the data we need
* With the post value of id, we check the id of the customer
* Use id of the customer to check fixed and variable discounts and group id
* Use group id to check fixed and variable discounts and parent id
* While parent id!=null, use parent id to check fixed and variable discounts of parent group
* Add sum of fixed discounts to highest value of variable discount
* Deduct discount from item price
* If item price < 0, item price = 0

## Day 4
* Added n actual login page for a customer.
* Added a table where you can see in detail how the price is calculated.
* The possibility to have different prices for different quantities (look, 1 EUR per item for 1, 0.9 EUR per item for 100, ...).
* A category page for the different products.

# Application Development (self-hosted)

## Clone repository

```
git clone git@github.com:Leweyse/oop-pricecalculator.git
cd oop-pricecalculator
```

## Add `.env` file

Before working on this project locally create a `.env` file in the root of the project. Add the Hostname, Username, Password and Database information from your local device.

```
HOSTNAME=xxxx
USERNAME=xxxx
PASSWORD=xxxx
DATABASE=xxxx
```

# Contributors

<table>
<td>
<article style="text-align:center">
<img src="https://avatars.githubusercontent.com/u/70060756?v=4" width="150px">

[Jörg von Dzerzawa][gh-j]

[jvondzerza][gh-j]
</article>
</td>
<td>
<article style="text-align:center">
<img src="https://avatars.githubusercontent.com/u/69996340?v=4" width="150px">

[Daryl Castro][gh-l]

[Leweyse][gh-l]
</article>
</td>
</table>

[gh-j]: https://github.com/jvondzerza
[gh-l]: https://github.com/Leweyse
[ff]: https://github.com/Leweyse/oop-pricecalculator/blob/main/Helper/Connection.php