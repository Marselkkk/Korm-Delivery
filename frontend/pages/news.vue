<script lang="ts" setup>
    const props = withDefaults(defineProps<{
        
    }>(),
    {
    
    })
</script>

<template>
    <Header></Header>
    <HeroSecond type="news"
    page="Новости"
    title="Новости и обновления"
    desc="Следите за последними новостями, акциями и полезными материалами для заботы о ваших питомцах. Мы регулярно делимся свежими поступлениями, рекомендациями по питанию и важными обновлениями." />

    <section>
        <div class="news-section">
            <div class="news-section__container">
                <NewsCard image="/images/news/news_1.jpg"></NewsCard>
                <NewsCard image="/images/news/news_2.jpg" tag="useful"></NewsCard>
                <NewsCard image="/images/news/news_3.jpg" tag="top"></NewsCard>
                <NewsCard image="/images/news/news_4.jpg" tag="useful"></NewsCard>
                <NewsCard image="/images/news/news_5.jpg" tag="useful"></NewsCard>
                <NewsCard image="/images/news/news_6.png" tag="top"></NewsCard>
            </div>
        </div>
    </section>

    <Footer></Footer>
</template>

<style lang="scss">
    .news-section {
        margin-top: 3.75rem;
        &__container {
            background-color: #F8F2D5;
            padding: 2.5rem 1.25rem;
            @include grid(3, 2.5rem);
            @include mobile {
                @include df_fdc;
                gap: 1rem;
            }
        }
    }
</style>