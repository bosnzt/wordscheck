const rpc_proto = require('./proto')
const grpc = require('@grpc/grpc-js')

//base node.js 16.19.0

function main() {
    var content = "他在传播艳情内容"
    var url = "localhost:50051"
    var client = new rpc_proto.Greeter(url, grpc.credentials.createInsecure())
    client.Check({ Content: content }, function(err, response) {
        if (err) {
            console.error('Error: ', err)
        } else {
            console.log(response)
        }
    })
}

main()