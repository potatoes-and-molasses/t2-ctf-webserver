import discord
import asyncio
import logging
import json
import random
import re
import os
import base64
import requests

#per-instance config
def get_config(endpoint, team_name, typee):
    r = requests.get('{}?team={}&type={}'.format(endpoint, team_name, typee), headers={'api-key':'HakunaMatata69'}).json()
    if r['status']:
        return r
    else:
        raise Exception("failed to get per-instance config from {}".format(endpoint))

TEAM_NAME = os.environ['TEAM_NAME']
ASAF_APIENDPOINT = 'http://ec2-35-176-150-168.eu-west-2.compute.amazonaws.com:3000/ctf/server_config'
CONFIG = get_config(ASAF_APIENDPOINT, TEAM_NAME, 'web')
ADMIN_IDS = CONFIG['data']['adminIds']
CLIENT_TOKEN = CONFIG['data']['discordToken']

#DISCORD_INVITE_STANDIN
logging.basicConfig(level=logging.INFO)
DB_PATH = r'/var/www/html/php/respectable_establishment/refunds.live'
INFO_CHANNEL = 'info'
BEETS_CHANNEL = 'beetcoin'
BEET_REPLIES = ['sick beets', 'reasonable effort..', 'this beet is quite a hit', 'beetlejuice?',
                'INITIATE PROTOCOL b1.0 - SHOW AFFECTION TOWARDS USER... ERROR, USER APPEARS TO BE A REPULSIVE SOCIOPATH, PLEASE TRY AGAIN LATER',
                'wow. such beet. very currency. amaze!', '*engage in constructive criticism*... nice:)']
                
                      



client = discord.Client()

@client.event
async def on_ready():
    print("init baker...")
    print('Invite: https://discordapp.com/oauth2/authorize?client_id={}&scope=bot'.format(client.user.id))
            
@client.event
async def on_message(message):
    
    if (message.author.id in ADMIN_IDS and str(message.channel) == INFO_CHANNEL):
        if message.content.startswith('!refund'):
            try:
                tmp, token, key = message.content.split(' ')
                current_db = json.load(open(DB_PATH,'r'))
                current_db[token] = key
                json.dump(current_db, open(DB_PATH, 'w'))
                tmp = await client.send_message(message.channel, "refund order sent")
            except:
                tmp = await client.send_message(message.channel, "request denied due to shenanigans")
                
    if str(message.channel) == BEETS_CHANNEL:
        if message.content.startswith('!beetcoin'):
            tmp = await client.send_message(message.channel, random.choice(BEET_REPLIES), tts=True)

    


client.run(CLIENT_TOKEN)


