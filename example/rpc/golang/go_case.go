package main

//base golang1.19+

import (
	"context"
	pb "gocase/rpcsvc"
	"google.golang.org/grpc"
	"log"
	"time"
)

type WordData struct {
	Keyword  string
	Category string
}

type CheckResp struct {
	Code      string
	Msg       string
	ReturnStr string
	WordList  []WordData
}

func main() {
	content := "他在传播艳情内容"
	url := "localhost:50051"
	conn, err := grpc.Dial(url, grpc.WithInsecure())
	if err != nil {
		log.Printf("did not connect: %v", err)
		return
	}
	defer conn.Close()
	c := pb.NewGreeterClient(conn)

	ctx, cancel := context.WithTimeout(context.Background(), time.Second)
	defer cancel()

	checkResp, err := c.Check(ctx, &pb.CheckReq{Content: content})
	if err != nil {
		log.Printf("could not greet: %v", err)
		return
	}

	log.Printf("%+v", checkResp)
}
