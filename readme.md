**This tool for generating data for tracker module in elasticsuite** https://github.com/Smile-SA/elasticsuite 

Based on Behat and Selenium. For more information read http://mink.behat.org/en/latest/

**Installation:**
1. composer install
2. Paste you site url in file .behat.yml
3. Download chromedriver for you Google Chrome http://chromedriver.chromium.org/downloads and put it at the root of the tool. You can run it with command 'sudo ./chromedriver --port=9516'
4. java -jar selenium-server-standalone-3.0.1.jar -port 4444


**Run:**
1. For run all scenario: vendor/bin/behat.
2. For run separate scenario: vendor/bin/behat "path to scenario".
3. For restart session and clear cookies, you can add "And I reset session" in the scenario.
4. For add delay between the steps, you can add "And wait n seconds" in the scenario.




