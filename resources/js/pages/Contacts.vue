<template>
    <main class="py-20">
        <section class="container">
            <div class="box_shadow_stroke py-2 px-3 mb-5 w-fit">
                <h2 class="font-bold text-6xl">
                    I nostri <span class="c_seco_color">Contatti</span>
                </h2>
            </div>
            <div class="flex justify-center gap-10 lg:px-10">
                <!-- <li>
                    Email: admin.01@deliveboo.com
                </li>
                <li>
                    Telefono: +39 333 123 4567
                </li>
                <li>
                    Telepatia: Ammmmmhh
                </li>
            </ul> -->
                <div class="box_shadow_stroke p-2 sm:p-3 w-full lg:w-3/5">
                    <h3 class="font-bold text-3xl mb-3">
                        Assistenza Clienti
                    </h3>
                    <p class="text-xl mb-3">
                        Domande sul tuo ordine? <br>
                        Siamo qui per aiutare! Il modo più rapido per ottenere una risposta è utilizzare l'app o il sito web. Basta accedere al proprio account, selezionare un ordine recente e quindi utilizzare la guida all'ordine per segnalare la query. <br><br>

                        Oppure puoi scriverci a <span class="c_link_color cursor-pointer hover:text-red-400">support@deliveBoo.com</span>
                        <br><br>

                        Tieni presente che non accettiamo ordini per telefono, quindi se desideri effettuare un ordine, effettualo online.
                    </p>
                    <h3 class="font-bold text-3xl mb-3">
                        Richieste media
                    </h3>
                    <p class="text-xl mb-3">
                        Per preventivi, interviste o altre richieste dei media, inviare un'e-mail a: <span class="c_link_color cursor-pointer hover:text-red-400">press@deliveBoo.com</span>.<br><br>

                        Sfortunatamente l'ufficio stampa non ha accesso alle informazioni sull'account, quindi non può aiutare con le richieste dei clienti.<br><br>

                        Sede legale: via Boolean 123, Milano Italia
                    </p>
                </div>
            </div>
        </section>
    </main>
</template>
<script>
export default{
    mounted(){
        window.scrollTo(0,0)
    }
}
</script>