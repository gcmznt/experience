import MySQLdb
import getpass

db = MySQLdb.connect(host="localhost", # your host, usually localhost
                     user="root", # your username
                      passwd="", # your password
                      db="") # name of the data base

# you must create a Cursor object. It will let
#  you execute all the query you need
cur = db.cursor() 

username = raw_input("Username: ")
type(username)

# password = raw_input("User password: ")
# type(password)
password = getpass.getpass()

database = raw_input("Database name: ")
type(database)

settings = {
    'username': username,
    'password': password,
    'database': database,
}

# Use all the SQL you like
cur.execute("CREATE USER '%(username)s'@'localhost' IDENTIFIED BY '%(password)s';" % settings)
cur.execute("GRANT USAGE ON * . * TO '%(username)s'@'localhost' IDENTIFIED BY '%(password)s';" % settings)
cur.execute("CREATE DATABASE IF NOT EXISTS %(database)s;" % settings)
cur.execute("GRANT ALL PRIVILEGES ON %(database)s . * TO '%(username)s'@'localhost';" % settings)

print 'Done'
