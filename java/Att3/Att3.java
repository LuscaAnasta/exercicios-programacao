package Att3;

import java.util.Scanner;

public class Att3 {
    public static void main(String[] args){
        //variaveis para entrada do usuario
        String rua, bairro, cep, n;

        //variavel scanner para receber a entrado do usuario para a variavel rua
        Scanner sc1 = new Scanner(System.in);
        System.out.printf("Digite sua rua: ");
        rua = sc1.nextLine();
        //sc1.close();

        //variavel scanner para receber a entrado do usuario para a variavel bairro
        Scanner sc2 = new Scanner(System.in);
        System.out.printf("Digite seu bairro: ");
        bairro = sc2.nextLine();
        //sc2.close();

        //variavel scanner para receber a entrado do usuario para a variavel cep
        Scanner sc3 = new Scanner(System.in);
        System.out.printf("Digite seu cep: ");
        cep = sc3.nextLine();
        //sc3.close();

        //variavel scanner para receber a entrado do usuario para a variavel n
        Scanner sc4 = new Scanner(System.in);
        System.out.printf("Digite seu numero: ");
        n = sc4.nextLine();


        //Print que mostrara todos os dados em uma formação de endereço, utilizando String.format()
        System.out.printf(String.format("Seu endereço é: %s, %s, %s, %s", rua, n, bairro, cep));
    }
    
}
