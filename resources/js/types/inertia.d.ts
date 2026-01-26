import type { User } from './User'

export interface PageProps {
    auth: {
        user: User
    }
    csrf_token: string

    [key: string]: unknown
}
