import java.net.HttpURLConnection;
import java.net.URL;
import java.io.OutputStream;
import java.io.BufferedReader;
import java.io.InputStreamReader;
import org.json.JSONObject;

public class JavaCase {
    public static void main(String[] args) throws Exception {
        //检测服务的地址
        String url = "http://localhost:8080/wordscheck";
        JSONObject jsonObject = new JSONObject();
        //检测内容
        jsonObject.put("content", "他在传播艳情内容");
        String jsonOutput = jsonObject.toString();

        URL obj = new URL(url);
        HttpURLConnection con = (HttpURLConnection) obj.openConnection();
        con.setRequestMethod("POST");
        con.setRequestProperty("Content-Type", "application/json");

        con.setDoOutput(true);
        OutputStream os = con.getOutputStream();
        os.write(jsonOutput.getBytes());
        os.flush();
        os.close();

        int responseCode = con.getResponseCode();
        System.out.println("Response Code : " + responseCode);

        BufferedReader in = new BufferedReader(new InputStreamReader(con.getInputStream()));
        String inputLine;
        StringBuffer response = new StringBuffer();

        while ((inputLine = in.readLine()) != null) {
            response.append(inputLine);
        }
        in.close();

        System.out.println(response.toString());
    }
}