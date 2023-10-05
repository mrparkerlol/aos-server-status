async function aos_server_status(server_ip, server_list) {
    server_ip = server_ip.replace(/:[0-9]\.[0-9]+$/, "") // removes version info (0.75, etc), which isn't needed for identifier matching
    server_list_results = await (await fetch(server_list != undefined ? server_list : "https://services.buildandshoot.com/serverlist.json")).json()
    for (let server in server_list_results) {
        if (server.identifier == server_ip) {
            return server
        }
    }
}