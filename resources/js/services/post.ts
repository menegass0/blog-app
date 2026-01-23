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
                'X-CSRF-TOKEN': page.props.csrf_token, 
            },
        }
    )

    if (!response.ok) {
        throw new Error('Failed to like post')
    }

    return response
}

export async function createRepost(postId: number) {
    const page = usePage()

    const response = await fetch(
        route('posts.create.repost', postId),
        {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                Accept: 'application/json',
                'X-CSRF-TOKEN': page.props.csrf_token, 
            },
        }
    )

    if (!response.ok) {
        throw new Error('Failed to repost')
    }

    return response
}

export async function deleteRepost(postId: number) {
    const page = usePage()

    const response = await fetch(
        route('posts.remove.repost', postId),
        {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                Accept: 'application/json',
                'X-CSRF-TOKEN': page.props.csrf_token, 
            },
        }
    )

    if (!response.ok) {
        throw new Error('Failed to repost')
    }

    return response
}