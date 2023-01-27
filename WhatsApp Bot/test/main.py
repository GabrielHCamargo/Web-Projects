from selenium import webdriver
from selenium.webdriver.common.by import By

browser = webdriver.Firefox()
browser.get('https://ri.magazineluiza.com.br/')
browser.find_element(by=By.XPATH, value='/html/body/form/div[5]/div[1]/a[1]/img').click()
browser.find_element(by=By.XPATH, value='/html/body/form/div[7]/a').click()
browser.find_element(by=By.XPATH, value='//*[@id="collapseMobile-3"]/ul/li[2]/a').click()