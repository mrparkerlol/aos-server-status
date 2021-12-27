async function aos_server_status(server_ip, server_list) {
    server_ip = server_ip.replace(/:[0-9]\.[0-9]+$/, "") // removes version info (0.75, etc), which isn't needed for identifier matching
    server_list_results = await (await fetch(server_list != undefined ? server_list : "https://services.buildandshoot.com/serverlist.json")).json()
    let data = undefined
    server_list_results.forEach(server => {
        if (server.identifier == server_ip) {
            data = server
        }
    })

    return data
}