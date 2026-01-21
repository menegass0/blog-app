import '@inertiajs/core'
import { usePage } from '@inertiajs/vue3'

declare module '@inertiajs/core' {
    interface PageProps {
        csrf_token: string
    }
}

export async function toggleLikePost(postId: number) {
    const page = usePage()

    const response = await fetch(
        route('posts.like', postId),
        {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                Accept: 'application/json',
                'X-CSRF-TOKEN': page.props.csrf_token, // ✅ string
            },
        }
    )

    if (!response.ok) {
        throw new Error('Failed to like post')
    }

    return response.json()
}