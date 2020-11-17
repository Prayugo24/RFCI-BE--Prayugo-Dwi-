const config = require("../config");

function redirectUri() {
    return `${config.config.oauthUrl}/authorize?client_id=${config.config.clientId}`;
  }

module.export = {
    redirectUri: redirectUri
}
