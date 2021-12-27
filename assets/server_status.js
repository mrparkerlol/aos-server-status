let aos_server_status = async (server_ip, server_list) => {
    server_ip = server_ip.replace(/:[0-9]\.[0-9]+$/, "") // removes version info (0.75, etc), which isn't needed for identifier matching
    let server_list = await (await fetch(server_list != undefined ? server_list : "https://services.buildandshoot.com/serverlist.json")).json()
    let data = undefined
    server_list.forEach(server => {
        if (server.identifier == server_ip) {
            data = server
        }
    })

    return data
}