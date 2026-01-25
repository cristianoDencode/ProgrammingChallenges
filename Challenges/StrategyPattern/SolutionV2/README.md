# Technical Contextualization
- Objective: In this solution, I intend to explore Domain-Driven Design (DDD) principles to refactor the current architecture.

- Current State: The legacy Order class is implemented as an Anemic Domain Model. My goal is to transition this into a Rich Domain Model, encapsulating logic and ensuring invariants within the entity.

- Benchmarks: I will be introducing an Execution Timer (Execution Time Profiler) to the project to gather metrics on processing speed across different implementations.

- Disclaimer: This performance analysis is driven by technical curiosity. I am not establishing a definitive rule that one pattern is inherently superior to another, but rather evaluating trade-offs in specific contexts.

- Here is the formal and technical translation for your documentation or code review:

- In this second iteration, I have strictly adhered to SOLID principles while preserving the existing business logic. Overall, the architecture is robust; however, there is one specific point of concern which I have documented in the source code. The current dynamic execution flow carries a risk of logic collisions: if a developer accidentally registers multiple strategies with overlapping conditions, an action could be applied twice unintentionally. While this behavior could be considered an advantage—allowing for cumulative calculations—it requires more granular control. Frankly, leaving this logic as-is gives me a sense of 'architectural restlessness.' I would prefer to further refine this mechanism, perhaps by implementing a priority system or a conflict resolution layer, to ensure total predictability.

- I have another solution in mind, but it would introduce significant complexity in order to maintain SOLID principles. From my perspective, both current proposals are acceptable for now, though they certainly come with their own set of trade-offs and caveats.