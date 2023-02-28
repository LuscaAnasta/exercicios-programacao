import os
import random
recortar = ('-', '.')
cpf = 0


def gerar_cpf():
    while aleatorio == []:
        while True:
            aleatorio = [random.randint(0,9) for i in range(9)]
            if aleatorio != aleatorio[::-1]:
                aleatorio
                break

        
def calculo_cpf(cpf, result, conta):
    

    for n_str in cpf:
        n_int = int(n_str)
        r = n_int*conta
        conta-=1
        result+=r
    result*=10
    result %= 11
    print(result)
    return result


while True:
    resultado = 0
    contador = 10
    
    cpf_usuario = input(f'Veja se o CPF é Valido, \n\
Parametros [XXX.XXX.XXX-XX] ou [XXXXXXXXXXX]. \n\
Digite o CPF: ')

    for recorte in recortar:
        cpf_usuario = cpf_usuario.split(recorte)
        cpf_usuario= ''.join(cpf_usuario)
    print(len(cpf_usuario))
    
    if len(cpf_usuario) != 11:
        os.system('cls')
        print(f'CPF digitado invalido, parametros errados\n')
        continue
    
    digitos_calculo = cpf_usuario[:9] 
    try:
        cpf = int(cpf_usuario)
        while digitos_calculo != cpf_usuario:
            resultado = calculo_cpf(digitos_calculo, resultado, contador)
            resultado = resultado if resultado<10 else 0
            digitos_calculo += str(resultado)
            contador+=1
            resultado = 0
            if contador > 12 or cpf_usuario == cpf_usuario[::-1]:
                os.system('cls')
                print(f'CPF não existe.\n')
                break
        else:
            cpf_formatado=f'{cpf_usuario[:3]}.{cpf_usuario[3:6]}.{cpf_usuario[6:9]}-{cpf_usuario[9:]}'
            
            os.system('cls')
            print(f'CPF: {cpf_formatado} Existe.\n\n')
            
    except ValueError:
        os.system('cls')
        print(f'CPF invalido, digite apenas numeros\n')