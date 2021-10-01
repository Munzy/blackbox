"use strict"
const r = require('axios');

async function isProxy(ip){

    const response = await r.get("https://blackbox.ipinfo.app/lookup/" + ip);

    if(response.status == 200){

        if(response.body == "Y"){

            return true;

        }

        if(response.body == "N"){

            return false;

        }


    }

    throw new Error("Request Failed");

}

module.exports = {isProxy};