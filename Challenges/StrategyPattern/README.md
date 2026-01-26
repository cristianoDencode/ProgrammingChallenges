# Notice
Ignore using floats for monetary values. In a system, I’d prefer using integers and then displaying them converted to two decimal places whenever necessary.

# Strategy Pattern Refactoring – Code Smells Analysis 
Identifying Code Smells

OrderCalculator has multiple responsibilities, including:

validating customerType;

applying discounts;

calculating rates/fees.

Business rules are implemented using primitive type conditionals (strings).

The Order class is poorly designed and underutilized, despite being the core domain entity.

customerType is represented by magic strings (vip, employee, regular), increasing coupling and fragility.

SOLID principle violations:

Single Responsibility Principle (SRP)

❌ OrderCalculator handles validation, discount logic, and rate calculation.

❌ Order has no clear or meaningful responsibility.

Open/Closed Principle (OCP)

❌ OrderCalculator must be modified whenever a new customer type or pricing rule is introduced.

Liskov Substitution Principle (LSP)

❌ Polymorphism is not respected due to conditional logic and tight coupling instead of substitutable abstractions.

Interface Segregation Principle (ISP) and Dependency Inversion Principle (DIP)

❌ These principles cannot be applied due to the lack of proper abstractions and contracts.

The design does not follow SOLID principles at all.

What Can Be Improved

Validate inputs before any business processing, eliminating primitive types used to represent business rules.

Redesign Order as a true domain entity with explicit responsibilities.

Decompose OrderCalculator into smaller, cohesive components and refactor it into a set of interfaces (contracts) rather than a monolithic class.

Refactoring Strategy (Step by Step)

Introduce a Simple Factory

This still violates the Open/Closed Principle, but it is intentionally used as an intermediate refactoring step to:

remove conditional logic based on primitive types;

centralize object creation;

improve readability and maintainability.

Refactor the Order entity

Move core business behavior into Order, making it responsible for its own calculations.

Redefine OrderCalculator

Rename it to a more meaningful abstraction and convert it into an interface.

Implement concrete strategies

Create concrete implementations for discounts and rates, each respecting its own contract and encapsulating a single behavior.

Goal

The goal of this refactoring is to replace conditional logic with polymorphism, improve adherence to SOLID principles, and achieve a clean and extensible implementation of the Strategy Pattern.