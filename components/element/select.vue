<script lang="ts" setup>

    interface Option {
        label: string
        value: string | number
    }

    const props = withDefaults(defineProps<{
        modelValue?: string | number | null
        options: Option[]
        placeholder?: string
    }>(), {
        modelValue: null,
        placeholder: 'Выберите...'
    })

    const emit = defineEmits<{
        (e: 'update:modelValue', value: string | number): void
        }>()

        const isOpen = ref(false)
        const dropdownRef = ref<HTMLElement | null>(null)

        const selectedLabel = computed(() => {
        const found = props.options.find(o => o.value === props.modelValue)
        return found?.label || props.placeholder
    })

    const toggle = () => {
        isOpen.value = !isOpen.value
    }

    const select = (option: Option) => {
        emit('update:modelValue', option.value)
        isOpen.value = false
    }

    const handleClickOutside = (event: MouseEvent) => {
        if (dropdownRef.value && !dropdownRef.value.contains(event.target as Node)) {
            isOpen.value = false
        }
    }

    onMounted(() => {
        document.addEventListener('click', handleClickOutside)
    })

    onBeforeUnmount(() => {
        document.removeEventListener('click', handleClickOutside)
    })
    </script>

    <template>
        <div class="dropdown" ref="dropdownRef"
        :data-active="isOpen">
            <button class="dropdown__trigger" @click="toggle">
                {{ selectedLabel }}
                <span class="arrow" :class="{ open: isOpen }">
                    <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.5 4.97297L11.4833 0L13 1.51351L6.5 8L0 1.51351L1.51667 0L6.5 4.97297Z" fill="#181818"/>
                    </svg>
                </span>
            </button>

            <transition name="fade">
            <ul v-if="isOpen" class="dropdown__menu">
                <li
                v-for="option in options"
                :key="option.value"
                class="dropdown__item"
                @click="select(option)"
                >
                {{ option.label }}
                </li>
            </ul>
            </transition>
        </div>
    </template>

    <style lang="scss" scoped>
    .dropdown {
        position: relative;
        width: 200px;
        &[data-active="true"] {
            background-color: #fff;
        }
        &__trigger {
            width: 100%;
            padding: .375rem .75rem;
            background: transparent;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 1rem;
            font-weight: 400;
            color: #181818;
            @include manrope;
        }

        &__menu {
            position: absolute;
            width: 100%;
            padding-top: .75rem;
            background: #fff;
            list-style: none;
            padding: 0;
            z-index: 10;
            ul {
                li {
                    font-size: 1rem;
                    font-weight: 400;
                    color: #181818;
                    @include manrope;
                }
            }
        }

        &__item {
            padding: 10px;
            cursor: pointer;

            &:hover {
                background: #f3f3f3;
            }
        }
    }

    .arrow {
        transition: transform 0.2s ease;
        width: 0.8125rem;
        height: 0.5rem;
        @include df_ac_jcc;
        &.open {
            transform: rotate(180deg);
        }
    }

    .fade-enter-active,
    .fade-leave-active {
        transition: opacity 0.15s ease;
    }
    .fade-enter-from,
    .fade-leave-to {
        opacity: 0;
    }
</style>