const env = require("dotenv");
env.config()
const promise = require('request-promise');


module.exports = {
    Sorting : async function(req, res, next){
        try {
            var input = [4,9,7,5,8,9,3];
            var sorting = [];
            var number = 1;
            var leng = input.length
            var swapp;
            do {
                swapp = false;
                for (var i=0; i < leng; i++)
                {
                    if (input[i] > input[i+1])
                    {
                        key = [input[i+1],input[i]];
                        var temp = input[i];
                        input[i] = input[i+1];
                        input[i+1] = temp;
                        swapp = true;
                        
                        sorting.push(number+'. ['+key+']'+ ' -> ' +input);
                        console.log('['+key+']'+ ' -> ' +input);
                        i =0;
                        number++;
                    }
                }
                leng--;
            } while (swapp);
            return res.json(sorting)
        }catch(err) {
            console.error(err.message);
            res.status(500).send("Server Error");
        }
    }
}