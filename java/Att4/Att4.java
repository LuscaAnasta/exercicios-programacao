package Att4;

public class Att4 {
    public static void main(String[] args){
        //String[] lista armazenando itens
        String[] lista = {"Maçã    ", "Azeitona", "Abacaxi ","Manga   ","Maracuja"};
        //double[] preco armazenando valores
        double[] preco = {12, 15, 3, 70, 16.99};
        //variavel double para calcular o total das compras
        double total = 0;
        
        
        //for para exibir todos os itens e somar seus valores na variavel 'total'
        for(int i = 0; i <5; i++ ){
            
            System.out.println(String.format("[%s] - %s ---- %s",i+1, lista[i], preco[i]));
            total+=preco[i];
        }
        //Print para exibir o total
         System.out.println("Total das compras: R$"+total);
    }
}
