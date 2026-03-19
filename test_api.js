const https = require('https');
const getJSON = (url) => new Promise((resolve) => {
    https.get(url, (res) => {
        let body = '';
        res.on('data', chunk => body += chunk);
        res.on('end', () => resolve(JSON.parse(body)));
    });
});
async function run() {
    console.log(await getJSON('https://erpapi.thedigicoders.com/api/training/getAll').then(r => ('Training 1st: ' + JSON.stringify(r.data[0]))));
    console.log(await getJSON('https://erpapi.thedigicoders.com/api/education').then(r => ('Edu 1st: ' + JSON.stringify(r.data[0]))));
    console.log(await getJSON('https://erpapi.thedigicoders.com/api/college/names').then(r => ('College 1st: ' + JSON.stringify(r.data[0]))));
    try{
        const ts = await getJSON('https://erpapi.thedigicoders.com/api/training/getAll');
        const firstId = ts.data[0].id || ts.data[0]._id;
        console.log(await getJSON('https://erpapi.thedigicoders.com/api/technology/getByTrainingDuration/' + firstId).then(r => ('Tech 1st: ' + JSON.stringify(r.data ? r.data[0] : null))));
    } catch(e) {}
}
run();
