package main

//base golang1.19+

import (
	"bytes"
	"encoding/json"
	"io/ioutil"
	"log"
	"net/http"
)

type WordData struct {
	Keyword  string `json:"keyword"`
	Category string `json:"category"`
	Position string `json:"position"`
}

type CheckResp struct {
	Code      string
	Msg       string
	ReturnStr string     `json:"return_str"`
	WordList  []WordData `json:"word_list"`
}

func main() {
	content := "他在传播艳情内容"
	url := "http://localhost:8080/wordscheck"
	client := http.Client{}
	values := map[string]interface{}{
		"content": content,
	}
	jsondata, _ := json.Marshal(&values)
	req, _ := http.NewRequest(http.MethodPost, url, bytes.NewReader(jsondata))
	resp, err := client.Do(req)
	if err != nil {
		log.Printf("post err:%+v\n", err)
		return
	}

	defer resp.Body.Close()
	body, _ := ioutil.ReadAll(resp.Body)

	var checkResp CheckResp
	json.Unmarshal([]byte(body), &checkResp)
	log.Printf("code=%s\n", checkResp.Code)
	log.Printf("msg=%s\n", checkResp.Msg)
	log.Printf("return_str=%s\n", checkResp.ReturnStr)
	log.Printf("wordlist=%+v\n", checkResp.WordList)
}
