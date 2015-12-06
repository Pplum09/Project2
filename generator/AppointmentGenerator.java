import java.io.*;    
import java.util.*;
import java.text.*;

public class AppointmentGenerator {

    public static void main(String[] args) throws IOException{
        
    // id is generated ++ each iteration
    int count = 0;
    int advisorID[] = {2, 3, 4, 5};
    int id = 0;
    String major = "ENGR MENG CENG CMSC CMPE ";
    String sqlStart = "INSERT INTO `Proj2Appointments` (`Time`,`AdvisorID`,`Major`,`EnrolledID`,`EnrolledNum`,`Max`) VALUES (";
    String sql = "";
    String fullSql= "";
        
    Date dNow = new Date();
    SimpleDateFormat ft = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");
     
    // construct queries
    //for (int h = 1; h < ; h++) { // advising appointments generated #
        for (int i = 1; i < 20; i++) { // date
            for (int j = 1; j < 24; j++) { //hour
                for (int k = 0; k < 4; k++) { //advisor id
                    sql = "";
                    id++;
                    dNow.setDate(i);
                    dNow.setHours(j);
                    sql += sqlStart + "\'" + ft.format(dNow) + "\', " + advisorID[k] + ", \'" + major + "\', \'\', 0, 1); " ;
                    fullSql += sql;
                    //System.out.println(sql);
                    count++;   
                }     
            }
        }
    //}
    System.out.println(count + " queries generated");
    BufferedWriter writer = null;
        
    try {
        
        File out = new File("output.txt");
        
        writer = new BufferedWriter(new FileWriter(out));
        writer.write(fullSql);
    } catch(Exception e) {
        e.printStackTrace();
    } finally {
        try {
            writer.close();   
        } catch(Exception e) {
        }
    }

    }
}