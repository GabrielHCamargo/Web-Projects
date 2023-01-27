import openpyxl, time, urllib
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys

file = openpyxl.load_workbook('file.xlsx')
sheet = file['Sheet']

browser = webdriver.Firefox()
browser.get('https://web.whatsapp.com/')

while len(browser.find_element(by=By.ID, value='side')) < 1:
    time.sleep(1)
 
for rows in sheet.iter_rows(min_row=2):
    # print(rows[0].value, rows[1].value, rows[2].value)
    text = urllib.parse.quote(f'Olá, {rows[0].value}! {rows[2].value}')
    url = f'https://web.whatsapp.com/send?phone={rows[1].value}&text={text}'
    browser.get(url)
    while len(browser.find_element(by=By.ID, value='side')) < 1:
        time.sleep(1)
    browser.find_element(by=By.XPATH, value='//*[@id="main"]/footer/div[1]/div/span[2]/div/div[2]/div[2]/button/span')
    time.sleep(1)