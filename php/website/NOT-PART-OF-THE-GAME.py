import time
import os
import requests
import sys

i = 1 
while i:

    f= open("log" , 'r')
    for line in f:
        
        if 'logged' in line :
            
            team = os.getenv('TEAM_NAME', 'team1')
            url = 'http://ec2-35-176-150-168.eu-west-2.compute.amazonaws.com:3000/ctf/finished'
            headers = {'api-key': 'HakunaMatata69'}
            payload = {'team': team , 'stage': 'bypassedLogin'}
            
            try :
                r = requests.post(url, headers=headers , data=payload)
                print r.text
                if " Sent msgs" in r.text:
                    i = 0
                    f.close()
                    sys.exit(0)
                
            except requests.exceptions.RequestException as e:
                print e
                sys.exit(1)
            
            break;
    f.close()
    time.sleep(10)
