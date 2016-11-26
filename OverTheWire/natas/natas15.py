import urllib
import httplib2

natas15page = httplib2.Http()
natas15page.add_credentials('natas15', 'AwWj0w5cvxrZiONgZ9J5stNVkmxdk39J')

alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRSTUVWXYZ1234567890'
password = ''

idx = 0
substr = 1

queryParams = {}

while idx
