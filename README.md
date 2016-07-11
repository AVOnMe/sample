# 3 solutions

http://avonme.org/lib/git/quiz/test1.php
http://avonme.org/lib/git/quiz/test2.php
http://avonme.org/lib/git/quiz/test3.php


## 1. Coin Sums

In Germany the currency is made up of euro (€) and cent (ct) further more there are eight coins in general circulation:
1ct, 2ct, 5ct, 10ct, 20ct, 50ct, 1€ (100ct) and 2€ (200ct).
It is possible to make 2€ in the following way:

    1×1€ + 1×50ct + 2×20ct + 1×5ct + 1×2ct + 3×1ct

**How many different ways can 2€ be made using any number of coins?**

## 2. Six Snacks

Six Snacks is a restaurant chain with 5 locations. Every day the local store manager has to send the amount of meals and the money they made to the server at the Six Snacks headquarters.
In the folder `six_snacks/` you will find the kpi of the last 500 days.
**Process the data and write down what you would tell each store manager.**

## 3. Farmers Power Plants

Old MacDonald had a farm ... two wind turbines and a solarpanel. Beside his farming business he is making good money with renewable energy and so he considers to invest more money in wind turbines and solarpanels. To get a better monitoring for his power plants, he want's you to **write a tool which tells him about the kpi (money, kwh, status, service, ...) of his business**.
**Wind Turbines**

    service: after every 1000h
    money per kwh: 0.2105 €
    operating costs: 3500 €/year

**Solarpanel**

    service: after every 2500h
    money per kwh: 0.2105 €
    operating costs: 1500 €/year

Every hour the power plants send a HTTP(S) POST request to an url of your choice. The requests carry the following data:
**Wind Turbines Example**

    {
        "id": "9asn71h2d8",
        "name": "Wind Turbine 1",
        "power": 3.17,
        "hours_of_sunlight": 0.7
    }

**Solar Panel Example**

    {
        "id": "987bksd9z8",
        "name": "Solarpanel 1",
        "power": 1.03,
        "hours_of_sunlight": 0.03
    }

**Example Request**

    curl -X POST -H "Content-Type: application/json" -d '{
        "id": "987bksd9z8",
        "name": "Solarpanel 1",
        "power": 1.03,
        "hours_of_sunlight": 0.03
    }' "http://localhost/your-url"

