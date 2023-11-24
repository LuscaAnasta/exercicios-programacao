package Att9;

import java.util.Scanner;

public class Att9 {
    public static void main(String[] args){
        //variaveis para receber entradas do usuario 
        String opcao, c, r;
        //variaveis para manter condição do while
        Boolean cond = true, cond1 = false;
        //String[] cod para armazenar codigos do usuario
        String[] cod = new String[6];

        //while para manter o sistema até que o usuario deseje sair
        while(cond == true){

            //Opções que o usuario pode selecionar
            System.out.println("Selecione: [A] Adicionar codigos - [C] Consultar - [R] Rastreiar - [S] Sair");
            //Scanner para receber 'opçao' entrada do usuario
            Scanner sc1 = new Scanner(System.in);
            //.toUpperCase() para deixar resposta do usuario sempre maiuscula
            opcao = sc1.next().toUpperCase();

            //switch para direcionar de acordo com a resposta do usuario, se não for valida dira 'opção invalida'
            switch (opcao) {
                //opção A, para usuario adicionar codigos, ele tera que adicionar 6 codigos por vez
                case "A":
                    System.out.println("Digite 6 codigos podendo conter numeros e letras, com no minimo 3 digitos: ");
                    //for para limitar a quantidade de codigos possiveis
                    for(int i = 0;i<6;i++){
                        //while para segurar o usuario até que o codigo seja valido
                        while(true){
                            System.out.printf(String.format("Digite o codigo[%s]: ",i+1));
                            //.toUpperCase() para deixar resposta do usuario sempre maiuscula
                            c = sc1.next().toUpperCase();
                            //if para que o codigo tenha no minimo 3 digitos
                            if(c.length()>2){
                                //adiciona a entrada valida do usuario a cod[]
                                cod[i] = c;
                                break;
                            }else{System.out.println("Codigo invalido.");}
                        }
                    }
                    break;
                //Opção C para consultar codigos existentes, caso não haja codigos dira 'NENHUM CODIGO CADASTRADO'
                case "C":
                //if para checar se ha codigos cadastrados
                    if(cod[1]!=null){
                        //for para listar cod[], mostrando todos os codigos
                        for(int i = 0;i<6;i++){
                            System.out.println(String.format("Codigo[%s]: %s",i,cod[i]));
                        }
                    }else{
                        System.out.println("Nenhum codigo foi cadastrado.");
                    }
                    break;

                //Opção R, para rastrear um codgio existente, se não existir dira 'STATUS: ENCOMENDA INEXISTENTE'
                case "R":
                    System.out.println("Digite o codigo que deseja rastrear: ");
                    //recebera entrada do usuario
                    r = sc1.next().toUpperCase();
                    //for para checar a entrada do usuario com um codigo existente
                    for(int i = 0;i<6;i++){
                        //if para checar se a entrada do usuario e cod[i] são iguais
                        if(r.equals(cod[i])){
                            System.out.println(String.format("Codigo: %s",cod[i]));
                            System.out.println("STATUS: ENVIADA");
                            cond1 = true;
                        }
                    }
                    if(cond1 == false){
                            System.out.println("STATUS: ENCOMENDA INEXISTENTE");
                        }
                    cond1 = false;
                    break;

                //Opção S, se selecionada o sistema encerrara
                case "S":
                    System.out.printf("Encerrando sistema. tchau");
                    cond = false;
                    break;
                default:
                    System.out.printf("Opção invalida.");
                    break;
            }
        }
    }
}
