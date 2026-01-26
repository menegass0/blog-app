import type { Post } from './Post'

export interface CreatePostResponseProps {
    data: {
        original: {
            post: Post
        }
    }
}

export function hasCreatePostData(
    props: unknown
    ): props is CreatePostResponseProps {
        return (
            typeof props === 'object' &&
            props !== null &&
            'data' in props
        )
    }