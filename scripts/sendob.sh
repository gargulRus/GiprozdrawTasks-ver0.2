# Какая-то команда для пробелов. Хз. 
IFS=$'\n'

# переменные полученные из php-скрипта по порядку.
POS2="$1"
# основная команда
curl -s -X POST https://api.telegram.org/bot518649481:AAH7d6O_IVseetZ-bzNexVdPkdVUXI6jo5Y/sendMessage -d chat_id=416641360 -d text="$POS2"

