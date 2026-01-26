import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'
import type { PageProps } from '../types/inertia'

export function useAuth() {
    const page = usePage<PageProps>()

    const user = computed(() => page.props.auth?.user)
    const isLoggedIn = computed(() => !!user.value)

    return { user, isLoggedIn }
}
